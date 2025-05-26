<?php
include("../process/session.php");
include("../process/koneksi.php");

$id_identitas = $_SESSION['id_identitas'];
$query = "SELECT d.* FROM identitas i JOIN diabetes d ON i.id_diabetes = d.id_diabetes WHERE i.id_identitas='$id_identitas'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Hasil Cek Diabetes</title>
  <link rel="stylesheet" href="../assets/diabetes.css">
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
      <h2>Hasil Risiko Diabetes</h2>
      <?php if ($data): ?>
        <p><strong>Skor:</strong> <?= $data['skor'] ?></p>
        <p><strong>Risiko:</strong> <?= $data['risiko'] ?></p>
        <p><strong>Tanggal Tes:</strong> <?= $data['tanggal'] ?></p>
        <a href="diabetes_cek.php">Tes Ulang</a>
      <?php else: ?>
        <p>Data belum tersedia.</p>
        <a href="diabetes_cek.php">Mulai Tes</a>
      <?php endif; ?>
    </section>
</body>
</html>
