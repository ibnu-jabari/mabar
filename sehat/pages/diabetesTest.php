<?php include("../process/session.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cek Risiko Diabetes</title>
  <link rel="stylesheet" href="../assets/diabetestes.css">
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
      <h2>Cek Risiko Diabetes</h2>
      <form action="../process/diabetesProses.php" method="POST">
        <p>Jawab Ya (1) atau Tidak (0):</p>
    
        <?php
        $pertanyaan = [
          "Apakah Anda sering merasa haus berlebihan?",
          "Apakah Anda sering buang air kecil?",
          "Apakah Anda sering merasa lapar berlebihan?",
          "Apakah Anda merasa kelelahan terus-menerus?",
          "Apakah ada anggota keluarga dengan riwayat diabetes?",
          "Apakah Anda mengalami penurunan berat badan tanpa sebab?",
        ];
    
        foreach ($pertanyaan as $i => $t) {
          echo "<p>$t</p>";
          echo "<label><input type='radio' name='q$i' value='1' required> Ya</label> ";
          echo "<label><input type='radio' name='q$i' value='0'> Tidak</label><br><br>";
        }
        ?>
        <button type="submit">Lihat Hasil</button>
      </form>
  </section>
</body>
</html>
