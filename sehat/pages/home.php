<?php
    include("../process/session.php");
    include("../process/koneksi.php");

    $email = $_SESSION['email'];
    $id_akun = $_SESSION['id_akun'];
    $id_identitas = $_SESSION['id_identitas'];

    $query_akun = "SELECT * FROM akun WHERE id_identitas = '$id_identitas'";
    $result_akun = mysqli_query($koneksi, $query_akun);
    $baris_akun = mysqli_fetch_assoc($result_akun);

    $query_identitas = "SELECT * FROM identitas WHERE id_identitas = '$id_identitas'";
    $result_identitas = mysqli_query($koneksi, $query_identitas);
    $baris_identitas = mysqli_fetch_assoc($result_identitas);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beranda - Cek Kesehatan</title>
    <link rel="stylesheet" href="../assets/home.css">
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
    
        <div class='container'>
            <div class="bagi">
                <div class="container-box">
                    <h2>Halo <?php
                        echo $baris_identitas['nama'];
                    ?>!</h2>
                </div>
                <div class="container-box">
                    <h2>Indeks Massa Tubuh (IMT)</h2>
                    <a href="bmiCek.php">Cek</a>
                    <a href="bmi.php">Hasil</a>
                </div>
            </div>
            <div class="bagi">
                <div class="container-box">
                    <h2>Depresi</h2>
                    <a href="mentalTest.php">Cek</a>
                    <a href="mental.php">Hasil</a>
                </div>
                <div class="container-box">
                    <h2>Diabetes</h2>
                    <a href="diabetesTest.php">Test</a>
                    <a href="diabetes.php">Hasil</a>
                </div>
            </div>
        <br>
    </div>
</section>
</body>
</html>