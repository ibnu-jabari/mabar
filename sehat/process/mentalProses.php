<?php
include("session.php");
include("koneksi.php");

$id_identitas = $_SESSION['id_identitas'];
$skor = 0;

// Jumlah pertanyaan = 9
for ($i = 0; $i < 9; $i++) {
    if (isset($_POST["q$i"])) {
        $skor += (int)$_POST["q$i"];
    }
}

// Tentukan tingkat depresi
if ($skor < 5) $kategori = "Normal";
elseif ($skor < 10) $kategori = "Ringan";
elseif ($skor < 15) $kategori = "Sedang";
elseif ($skor < 20) $kategori = "Cukup Berat";
else $kategori = "Berat";

// Simpan ke database
$tgl_input = date('Y-m-d');
$query_cek = mysqli_query($koneksi, "SELECT id_mental FROM identitas WHERE id_identitas='$id_identitas'");
$data = mysqli_fetch_assoc($query_cek);
$id_mental = $data['id_mental'] ?? null;

if ($id_mental) {
    // update
    mysqli_query($koneksi, "UPDATE mental SET skor='$skor', kategori='$kategori', tgl_input='$tgl_input' WHERE id_mental='$id_mental'");
} else {
    // insert baru
    mysqli_query($koneksi, "INSERT INTO mental (skor, kategori, tgl_input) VALUES ('$skor', '$kategori', '$tgl_input')");
    $id_baru = mysqli_insert_id($koneksi);
    mysqli_query($koneksi, "UPDATE identitas SET id_mental='$id_baru' WHERE id_identitas='$id_identitas'");
}
// echo "skor: $skor, kategori: $kategori, tgl_input: $tgl_input";
header("Location: ../pages/mental.php");
exit;
?>
