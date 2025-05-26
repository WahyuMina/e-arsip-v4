<?php
    // persiapan function untuk upload file/foto
    function upload() 
    {
        // deklarasi variable kebutuhan
        $namafile = $_FILES['file']['name'];
        $ukuranfile = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $tmpname = $_FILES['file']['tmp_name'];

        // cek apakah yang diupload adalah file/gambar
        $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
        $eksfile = explode('.', $namafile);
        $eksfile = strtolower(end($eksfile));
        if (!in_array($eksfile, $eksfilevalid)) {
            echo "<script>
            alert ('yang anda Upload Bukan Gambar/File PDF..!')
            </script>";
            return false;
        }

        /// cek jika ukuran file terlalu besar
        if ($ukuranfile > 1000000) {
             echo "<script>
            alert ('Ukuran File Anda terlalu Besar!')
            </script>";
            return false;
        }

        // jika lolos pengecekan, file siap diupload
        // generaet nama file baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $eksfile;

        move_uploaded_file($tmpname, 'file/'.$namafilebaru);
        return $namafilebaru;

    }
?>