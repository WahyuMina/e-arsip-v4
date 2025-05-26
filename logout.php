<?php
    session_start();
    unset($_SESSION['id_user']);
    unset($_SESSION['username']);

    session_destroy();
    echo "<script>
        alert ('Anda Telah Keluar dari Halaman Administator'); 
        document.location='index.php';
        </script>";
?>