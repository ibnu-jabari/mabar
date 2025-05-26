<?php
include("koneksi.php");
include("session.php");

$id_identitas = $_SESSION['id_identitas'];

$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$gender = $_POST['gender'];

// Hitung ulang usia
$lahir = new DateTime($tgl_lahir);
$sekarang = new DateTime();
$usia = $sekarang->diff($lahir)->y;

$query = "UPDATE identitas 
          SET nama='$nama', gender='$gender', tgl_lahir='$tgl_lahir', usia=$usia
          WHERE id_identitas = '$id_identitas'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Profil berhasil diperbarui!'); window.location='../pages/profile.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui profil!'); window.location='../pages/edit_profile.php';</script>";
}
?>
