<?php
include("session.php");
include("koneksi.php");

$id_identitas = $_SESSION['id_identitas'];
$skor = 0;

for ($i = 0; $i < 6; $i++) {
  if (isset($_POST["q$i"])) {
    $skor += (int)$_POST["q$i"];
  }
}

if ($skor <= 1) $risiko = "Rendah";
elseif ($skor <= 3) $risiko = "Sedang";
else $risiko = "Tinggi";

$tanggal = date('Y-m-d');

// cek apakah identitas sudah punya data
$cek = mysqli_query($koneksi, "SELECT id_diabetes FROM identitas WHERE id_identitas='$id_identitas'");
$data = mysqli_fetch_assoc($cek);
$id_diabetes = $data['id_diabetes'] ?? null;

if ($id_diabetes) {
  mysqli_query($koneksi, "UPDATE diabetes SET skor='$skor', risiko='$risiko', tanggal='$tanggal' WHERE id_diabetes='$id_diabetes'");
} else {
  mysqli_query($koneksi, "INSERT INTO diabetes (skor, risiko, tanggal) VALUES ('$skor', '$risiko', '$tanggal')");
  $new_id = mysqli_insert_id($koneksi);
  mysqli_query($koneksi, "UPDATE identitas SET id_diabetes='$new_id' WHERE id_identitas='$id_identitas'");
}

header("Location: ../pages/diabetes.php");
exit;
?>
