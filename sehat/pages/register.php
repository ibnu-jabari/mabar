<?php
include("../process/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/register.css">
    <title>Register</title>
</head>

<body>
    <div class="kembali">
        <a href="login.php"><- kembali</a>
    </div>
    <section>
        <div class="container">
            <form action="../process/cekRegis.php" method="POST">
                <h1>Register</h1>

                <div class="input">
                    <input type="text" id="nama" name="nama" required>
                    <label for="nama">Nama Lengkap</label><br>
                </div>

                <div class="bareng">
                    <div class="input-date">
                        <label for="tgl_lahir">Tanggal Lahir</label><br>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" required>
                    </div>
    
                    <div class="input-radio">
                        <label for="jenis_kelamin">Jenis Kelamin</label><br>
                        <div class="radio-group">
                            <input type="radio" id="laki" name="jenis_kelamin" value="L" required>
                            <label for="laki">Laki-laki</label><br>
                            <input type="radio" id="perempuan" name="jenis_kelamin" value="P">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>


                <div class="input">
                    <input type="email" id="email" name="email" required>
                    <label for="email">Email</label><br>
                </div>
                <div class="input">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label><br>
                </div>

                <div class="input">
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    <label for="confirm_password">Confirm Password</label><br>
                </div>
                <div class="submit">
                    <button type="submit">Daftar</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>