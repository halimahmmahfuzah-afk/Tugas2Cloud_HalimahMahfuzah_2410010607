<?php
session_start();
include 'koneksi.php';

// Jika tombol login ditekan
if (isset($_POST['btn_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek user pada database
    $cek_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($cek_user) > 0) {

        $data = mysqli_fetch_array($cek_user);

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['status_login'] = true;

        header("Location: dashboard.php");
        exit;

    } else {

        echo "<script>alert('Login Gagal! Username atau Password salah.');</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pengaduan Masyarakat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary d-flex align-items-center" style="height:100vh;">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow-lg border-0 rounded-lg">

                    <div class="card-header bg-white text-center pt-4 pb-3">
                        <h3 class="fw-light">Login Sistem</h3>
                        <p class="text-muted mb-0">Layanan Pengaduan Masyarakat</p>
                    </div>

                    <div class="card-body p-4">

                        <form method="POST">

                            <div class="form-floating mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="username"
                                    placeholder="Username"
                                    required>

                                <label for="username">Username</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Password"
                                    required>

                                <label for="password">Password</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="btn_login" class="btn btn-primary btn-lg">
                                    Login
                                </button>
                            </div>

                        </form>

                    </div>

                    <div class="card-footer text-center py-3">
                        <small>
                            <a href="#" class="text-decoration-none">
                                Belum punya akun? Daftar sebagai Masyarakat
                            </a>
                        </small>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
