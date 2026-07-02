<?php
session_start();
include 'koneksi.php';

// Proteksi, hanya masyarakat yang bisa lapor
if ($_SESSION['role'] != 'masyarakat') {
    echo "<script>alert('Hanya masyarakat yang bisa membuat laporan!'); window.location='dashboard.php'; </script>";
    exit;
}

// Proses simpan data ke database
if (isset($_POST['btn_simpan'])) {
    $tgl_pengaduan = date('Y-m-d');// Tanggal otomatis hari ini
    $id_user = $_SESSION['id_user']; // ID user diambil dari session yang login
    $isi_laporan = $_POST['isi_laporan'];

    $simpan = mysqli_query($koneksi, "INSERT INTO tb_pengaduan (tgl_pengaduan, id_user, isi_laporan, status) VALUES ('$tgl_pengaduan', '$id_user', '$isi_laporan', 'pending')");

    if ($simpan) {
        echo "<script>alert('Laporan berhasil dikirim!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal mengirim laporan!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <title>Buat Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
<!DOCTYPE html>
<html lang="id">

<head>
    <title>Buat Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Form Buat Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Tulis Isi Laporan Anda:</label>
                                <textarea class="form-control" name="isi_laporan" rows="5" required placeholder="Jelaskan laporan Anda di sini..."></textarea>
                            </div>
                            <button type="submit" name="btn_simpan" class="btn btn-success">Kirim Laporan</button>
                            <a href="dashboard.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
