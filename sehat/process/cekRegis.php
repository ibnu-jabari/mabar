<?php

    include("koneksi.php");

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan Confirm Password tidak cocok!'); window.location='../pages/register.php';</script>";
        exit();
    }

    $query = "SELECT * FROM akun WHERE email='$email'";
    $cek = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='../pages/register.php';</script>";
        exit();
    } else {
        $lahir = new DateTime($tgl_lahir);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($lahir)->y;

        $queryIdentitas = "INSERT INTO identitas (nama, gender, tgl_lahir, usia) VALUES ('$nama', '$jenis_kelamin', '$tgl_lahir', $umur)";
        $insertIdentitas = mysqli_query($koneksi, $queryIdentitas);

        if ($insertIdentitas) {
            $id_identitas = mysqli_insert_id($koneksi);

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $queryAkun = "INSERT INTO akun (id_identitas, email, password) VALUES ('$id_identitas', '$email', '$hashed_password')";
            $insertAkun = mysqli_query($koneksi, $queryAkun);

            if (!$insertAkun) {
                mysqli_query($koneksi, "DELETE FROM identitas WHERE id_identitas='$id_identitas'");
                echo "<script>alert('Gagal membuat akun! Silakan coba lagi.'); window.location='../pages/register.php';</script>";
                exit();
            }

            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='../pages/login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal! Silakan coba lagi.'); window.location='../pages/register.php';</script>";
        }
    }
?>