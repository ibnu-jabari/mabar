<?php
include("../process/session.php");
include("../process/koneksi.php");

$id_identitas = $_SESSION['id_identitas'];

$query = "SELECT m.* FROM identitas i JOIN mental m ON i.id_mental = m.id_mental WHERE i.id_identitas = '$id_identitas'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hasil Tes Mental</title>
    <link rel="stylesheet" href="../assets/mental.css">
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
        <h2>Hasil Tes Depresi Anda</h2>
        <?php if ($data): ?>
            <p><strong>Skor:</strong> <?= $data['skor'] ?></p>
            <p><strong>Kategori:</strong> <?= $data['kategori'] ?></p>
            <p><strong>Tanggal Tes:</strong> <?= $data['tgl_input'] ?></p>
            <br>
            <a href="mentalTest.php">Tes Ulang</a>
        <?php else: ?>
            <p>Belum ada data tes.</p>
            <a href="mentalTest.php">Mulai Tes</a>
        <?php endif; ?>
    </section>
</body>
</html>
