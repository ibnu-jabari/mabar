<?php
    session_start();
    include 'koneksi.php';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $query = "SELECT * FROM akun WHERE email='$email'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['id_akun'] = $row['id_akun'];
                $_SESSION['id_identitas'] = $row['id_identitas'];
                echo "<script>
                alert('Login Berhasil!');
                window.location.href = '../pages/home.php';
                </script>";
            } else {
                echo "<script>
                alert('Email atau password salah!1');
                window.location.href = '../pages/login.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('Email atau password salah!2');
            window.location.href = '../pages/login.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Silakan isi semua field!');
        window.location.href = '../pages/login.php';
        </script>";
    }
?>