<?php
include("../process/session.php");
include("../process/koneksi.php");

$id_identitas = $_SESSION['id_identitas'];

// Ambil data identitas
$query_identitas = "SELECT * FROM identitas WHERE id_identitas = '$id_identitas'";
$result_identitas = mysqli_query($koneksi, $query_identitas);
$data_identitas = mysqli_fetch_assoc($result_identitas);

$id_bmi = $data_identitas['id_bmi'] ?? null;

if ($id_bmi) {
    $query_bmi = "SELECT * FROM bmi WHERE id_bmi = '$id_bmi'";
    $result_bmi = mysqli_query($koneksi, $query_bmi);
    $data_bmi = mysqli_fetch_assoc($result_bmi);
} else {
    $data_bmi = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/bmi.css">
    <title>Hasil BMI</title>
</head>
<body>
    <div class="navbar">
        <div class="nav-left">
            <a href="home.php">Cek Kesehatan</a>
            <div class="logo">
                <img src="../assets/logo.png" alt="Logo" style="width: 75px; height: auto;">
            </div>
        </div>
        <div class="nav-right">
            <div class="profile">
                <a href="profile.php">Profile</a>
            </div>
            <div class="logout">
                <a href="../process/logout.php">Logout</a>
            </div>
        </div>
    </div>
    <section>
        <h2>Hasil Pengukuran BMI</h2>
        <?php if ($data_bmi): ?>
            <p><strong>Berat:</strong> <?= $data_bmi['bb'] ?> kg</p>
            <p><strong>Tinggi:</strong> <?= $data_bmi['tb'] ?> cm</p>
            <p><strong>Kategori:</strong> <?= $data_bmi['kategori'] ?></p>
            <p><strong>Tanggal Input:</strong> <?= $data_bmi['tgl_input'] ?></p>
            <a href="bmiCek.php">Edit Data BMI</a>
        <?php else: ?>
            <p>Data BMI belum tersedia.</p>
            <a href="bmiCek.php">Isi Sekarang</a>
    </section>
    <?php endif; ?>
</body>
</html>
