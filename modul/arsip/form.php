<?php

    // include "config/function.php";

    if (isset($_POST['bsimpan'])) 
    {
        if (@$_GET['hal'] == "edit") {
            # perintah edit data
            // UBAH DATAA
          
            $ubah = mysqli_query($koneksi, "UPDATE tbl_arsip SET 
            no_surat = '$_POST[no_surat]',
            tanggal_surat = '$_POST[tanggal_surat]',
            tanggal_diterima = '$_POST[tanggal_diterima]',
            perihal = '$_POST[perihal]', 
            id_departemen = '$_POST[id_departemen]', 
            id_pengirim = '$_POST[id_pengirim]', 
            file = '-' 
            where id_arsip = '$_GET[id]' ");
            // die();
            if ($ubah) {
                echo "<script>
                    alert('Ubah Data Sukses');
                    document.location='?halaman=arsip_surat';
                </script>";
            }
            else {
                echo "<script>
                    alert('Ubah Data GAGAL!');
                    document.location='?halaman=arsip_surat';
                </script>";
            }
        } else{
                 $simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip VALUES ('', '$_POST[no_surat]',
                 '$_POST[tanggal_surat]',
            '$_POST[tanggal_diterima]',
            '$_POST[perihal]',
            '$_POST[id_departemen]',
            '$_POST[id_pengirim]',
            '$file'
            )");
            if ($simpan) {
                echo "<script>
                    alert('Simpan Data Sukses');
                    document.location='?halaman=arsip_surat';
                </script>";
            } else {
                echo "<script>
                    alert('Simpan Data GAGAL!');
                    document.location='?halaman=arsip_surat;</script>";
            }
        }
    }

    if (isset($_GET['hal'])) 
    {
        if ($_GET['hal'] == "edit")
         {
             $tampil = mysqli_query($koneksi, "SELECT tbl_arsip.*, tbl_departemen.nama_departemen,
                tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                from tbl_arsip, tbl_departemen, tbl_pengirim_surat where tbl_arsip.id_departemen = tbl_departemen.id_departemen and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim 
                 and tbl_arsip.id_arsip='$_GET[id]'");
             $data = mysqli_fetch_array($tampil);
             if ($data) {
                 $vno_surat = $data['no_surat'];
                 $vtanggal_surat = $data['tanggal_surat'];
                 $vtanggal_diterima = $data['tanggal_diterima'];
                 $vperihal = $data['perihal'];
                 $vid_departemen = $data['id_departemen'];
                 $vnama_departemen = $data['nama_departemen'];
                 $vid_pengirim = $data['id_pengirim'];
                 $vnama_pengirim = $data['nama_pengirim']; 
                 $vfile = $data['file']; 
             }
        }
        elseif($_GET['hal'] == 'hapus')
        {
           $hapus = mysqli_query($koneksi, "DELETE from tbl_arsip where id_arsip = '$_GET[id]' ");
           if($hapus){
            echo "<script>
            alert('Hapus Data Sukses');
            document.location='?halaman=arsip_surat';
            </script>";
           } 
        } 
    }
?>
<div class="card">
    <div class="card-header bg-info text_white">
        From Data Arsip
    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="no_surat">No Surat</label>
                <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?=@$vno_surat?>"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="tanggal_surat">Tanggal Surat</label>
                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat"
                    value="<?=@$vtanggal_surat?>" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="tanggal_diterima">Tanggal Diterima</label>
                <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima"
                    value="<?=@$vtanggal_diterima?>" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="nama_pengirim">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" value="<?=@$vperihal?>"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="id_departemen">Departemen / Tujuan</label>
                <select class="form-control" name="id_departemen">
                    <option value="<?=@$vid_departemen?>"><?=@$vnama_departemen?>
                    </option>
                    <?php
                        $tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen order by nama_departemen asc");
                        while($data = mysqli_fetch_array($tampil)){
                            echo "<option value ='$data[id_departemen]'> $data[nama_departemen]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_pengirim">Pengirim Surat</label>
                <select class="form-control" name="id_pengirim">
                    <option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?>
                    </option>
                    <?php
                        $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by nama_pengirim asc");
                        while($data = mysqli_fetch_array($tampil)){
                            echo "<option value ='$data[id_pengirim]'> $data[nama_pengirim]</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="file">Pilih File</label>
                <input type="file" class="form-control" id="file" name="file" value="<?=@$vfile?>"
                    aria-describedby="emailHelp">
            </div> -->

            <button type="submit" name="bsimpan" class="btn btn-primary">Submit</button>
            <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
        </form>
    </div>
</div>