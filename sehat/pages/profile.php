<?php
include("../process/session.php");
include("../process/koneksi.php");

$email = $_SESSION['email'];
$id_akun = $_SESSION['id_akun'];
$id_identitas = $_SESSION['id_identitas'];

// Ambil data identitas
$query = "SELECT * FROM identitas WHERE id_identitas = '$id_identitas'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$profil = mysqli_fetch_assoc($result);

if($profil['gender'] == 'L') {
    $gender = 'Laki-laki';
} else if($profil['gender'] == 'P') {
    $gender = 'Perempuan';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            text-align: left;
            padding: 10px 15px;
        }
        th {
            background: #eeeeee;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .btn-edit {
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-edit:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div>
        <nav>
            <a href="home.php">Beranda</a>
            <a href="profile.php">Profil</a>
            <a href="../process/logout.php">Logout</a>
        </nav>
    </div>
    

    <div class="container">
        <h2>Detail Profil</h2>
        <table>
            <tr><th>Nama</th><td><?= htmlspecialchars($profil['nama']) ?></td></tr>
            <tr><th>Email</th><td><?= htmlspecialchars($email) ?></td></tr>
            <tr><th>Jenis Kelamin</th><td><?= htmlspecialchars($gender) ?></td></tr>
            <tr><th>Tanggal Lahir</th><td><?= htmlspecialchars($profil['tgl_lahir']) ?></td></tr>
            <tr><th>Usia</th><td><?= htmlspecialchars($profil['usia']) ?> tahun</td></tr>
        </table>

        <a href="profileEdit.php" class="btn-edit">Edit Profil</a>
    </div>

</body>
</html>
