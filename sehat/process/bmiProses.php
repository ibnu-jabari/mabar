<?php
include("session.php");
include("koneksi.php");

$id_identitas = $_SESSION['id_identitas'];
$bb = $_POST['bb']; // Berat badan (kg)
$tb = $_POST['tb']; // Tinggi badan (cm)
$tgl_input = date('Y-m-d');

// Hitung BMI
$tb_m = $tb / 100;
$bmi = $bb / ($tb_m * $tb_m);
$bmi = round($bmi, 1);

// Tentukan kategori
if ($bmi < 18.5) {
    $kategori = "Kurus";
} elseif ($bmi < 24.9) {
    $kategori = "Normal";
} elseif ($bmi < 29.9) {
    $kategori = "Gemuk";
} else {
    $kategori = "Obesitas";
}

// Cek apakah identitas sudah punya id_bmi
$query = "SELECT id_bmi FROM identitas WHERE id_identitas = '$id_identitas'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
$id_bmi = $data['id_bmi'] ?? null;

if ($id_bmi) {
    // Update data BMI yang sudah ada
    $update = "UPDATE bmi 
               SET bb = '$bb', tb = '$tb', kategori = '$kategori', tgl_input = '$tgl_input' 
               WHERE id_bmi = '$id_bmi'";
    mysqli_query($koneksi, $update);
} else {
    // Insert data baru ke BMI
    $insert = "INSERT INTO bmi (bb, tb, kategori, tgl_input) 
               VALUES ('$bb', '$tb', '$kategori', '$tgl_input')";
    if (mysqli_query($koneksi, $insert)) {
        $id_bmi_baru = mysqli_insert_id($koneksi);
        // Simpan id_bmi baru ke identitas
        mysqli_query($koneksi, "UPDATE identitas SET id_bmi = '$id_bmi_baru' WHERE id_identitas = '$id_identitas'");
    } else {
        echo "gagal2";
    }
}

// Redirect ke halaman hasil
header("Location: ../pages/bmi.php");
exit;
?>
