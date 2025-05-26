<?php
include("../process/session.php");
include("../process/koneksi.php");

$id_identitas = $_SESSION['id_identitas'];

$query = "SELECT * FROM identitas WHERE id_identitas = '$id_identitas'";
$result = mysqli_query($koneksi, $query);
$data_identitas = mysqli_fetch_assoc($result);

$id_bmi = $data_identitas['id_bmi'] ?? null;

$data_bmi = null;
if ($id_bmi) {
    $query_bmi = "SELECT * FROM bmi WHERE id_bmi = '$id_bmi'";
    $result_bmi = mysqli_query($koneksi, $query_bmi);
    $data_bmi = mysqli_fetch_assoc($result_bmi);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form BMI</title>
    <link rel="stylesheet" href="../assets/bmicek.css">
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
        <h2><?= $data_bmi ? "Edit Data BMI" : "Isi Data BMI" ?></h2>
        <form action="../process/bmiProses.php" method="POST">
            <label>Berat Badan (kg):</label><br>
            <input type="number" name="bb" required value="<?= $data_bmi['bb'] ?? '' ?>"><br><br>
    
            <label>Tinggi Badan (cm):</label><br>
            <input type="number" name="tb" required value="<?= $data_bmi['tb'] ?? '' ?>"><br><br>
    
            <button type="submit"><?= $data_bmi ? "Update" : "Simpan" ?></button>
        </form>
    </section>
</body>
</html>
