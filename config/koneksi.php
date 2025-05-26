<?php
        // Database server
       $server = "localhost";
       $user = "root";
       $pass = "";
       $database = "dbarsip"; 

    //    Koneksi Database
    $koneksi = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($koneksi));

?>