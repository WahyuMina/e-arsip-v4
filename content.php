<?php
@$halaman = $_GET['halaman'];

if($halaman == "departemen")
{
    // echo "Tampil Halaman Modul Departemen";
        include "modul/departemen/departemen.php";

}
 elseif ($halaman == "pengirim_surat") {
        include "modul/pengirim_surat/pengirim_surat.php";
 }
 
 elseif ($halaman == "arsip_surat") {
   // tampilkan halaman arsip surat
   if (@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus"){
      include "modul/arsip/form.php";
   } else {
      include "modul/arsip/data.php";
   }
 } else {
    // include ke home
    include "modul/home.php";
    // echo "Tampil Halaman Home";
 }
?>