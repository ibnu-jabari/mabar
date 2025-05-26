<?php
include("../process/session.php");
include("../process/koneksi.php");

$id_identitas = $_SESSION['id_identitas'];

// Ambil data lama
$query = "SELECT * FROM identitas WHERE id_identitas = '$id_identitas'";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
$data = mysqli_fetch_assoc($result);
if($data['gender'] == 'L') {
    $gender = 'Laki-laki';
} else if($data['gender'] == 'P') {
    $gender = 'Perempuan';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
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
        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="date"],
        form textarea,
        form select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form .radio-group {
            margin-top: 5px;
        }
        .btn-submit {
            margin-top: 20px;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Profil</h2>
    <form action="../process/profileUpdate.php" method="POST">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required>

        <label for="gender">Jenis Kelamin:</label>
        <div class="radio-group">
            <label><input type="radio" name="gender" value="L" <?= $data['gender'] == 'L' ? 'checked' : '' ?>> Laki-laki</label>
            <label><input type="radio" name="gender" value="P" <?= $data['gender'] == 'P' ? 'checked' : '' ?>> Perempuan</label>
        </div>

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
