<?php
    session_start();
    include "config/koneksi.php";

    // for login

    // for password MD5
    @$pass = md5($_POST['password']);
    echo $pass;


    @$username = mysqli_escape_string($koneksi, $_POST['username']);
    @$password = mysqli_escape_string($koneksi, $pass);

    $login = mysqli_query($koneksi, "SELECT * from tbl_user where username='$username' and password='$password'");

    $data = mysqli_fetch_array($login);
    if ($data) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        header('location:admin.php');
    }else {
        echo "<script>
        alert ('Login GAGAL!, Pastikan Username dan Password anda benar??'); 
        document.location='index.php';
        </script>";
    }
?>