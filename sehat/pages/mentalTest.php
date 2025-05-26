<?php
include("../process/session.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tes Depresi</title>
    <link rel="stylesheet" href="../assets/mentaltes.css">
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
        <h2>Tes Kesehatan Mental - Depresi</h2>
        <form method="POST" action="../process/mentalProses.php">
            <p>Dalam dua minggu terakhir, seberapa sering Anda mengalami hal berikut:</p>
    
            <?php
            $pertanyaan = [
                "Merasa sedih, murung, atau putus asa",
                "Kehilangan minat atau kesenangan dalam aktivitas",
                "Kesulitan tidur atau tidur berlebihan",
                "Merasa lelah atau tidak bertenaga",
                "Perubahan nafsu makan",
                "Merasa diri tidak berharga atau merasa bersalah",
                "Sulit konsentrasi",
                "Bergerak atau bicara sangat lambat atau gelisah",
                "Pikiran untuk menyakiti diri atau bunuh diri"
            ];
    
            foreach ($pertanyaan as $i => $text) {
                echo "<p>$text</p>";
                echo "<label><input type='radio' name='q$i' value='0' required> Tidak Pernah</label><br>";
                echo "<label><input type='radio' name='q$i' value='1'> Kadang-kadang</label><br>";
                echo "<label><input type='radio' name='q$i' value='2'> Sering</label><br>";
                echo "<label><input type='radio' name='q$i' value='3'> Hampir Setiap Hari</label><br><br>";
            }
            ?>
    
            <button type="submit">Lihat Hasil</button>
        </form>
    </section>
</body>
</html>
