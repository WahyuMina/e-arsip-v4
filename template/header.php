<?php
    session_start();
    if (empty($_SESSION['id_user']) or empty($_SESSION['username'])) {
        echo "<script>
        alert ('Maaf Untuk Mengakses halaman ini, silahkan Login terlebih dahulu.'); 
        document.location='index.php';
        </script>";
    }

?>

<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Arsip</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" </head>

<body>
    <!-- Awal Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="?" sty>
                <img class="rounded-circle" src="file/96d0a8d5124080d559d37fcd0b802571-removebg-preview.png" width="80">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="?">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?halaman=departemen">Data Departemen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?halaman=pengirim_surat">Data Pengirim Surat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?halaman=arsip_surat">Data Arsip Surat</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                        id="datatablesSimple">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>

    </nav>
    <!-- Akhir Nav -->
    <!-- Awal ontainer -->
    <div class="container mt-5 mb-5">