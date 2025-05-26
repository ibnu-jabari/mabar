<?php
    session_start();
    if(!isset($_SESSION['id_akun'])) {
        header("Location: ../pages/login.php");
        exit();
    }
?>