<?php
    // Uji jika tombol simpan
    if (isset($_POST['bsimpan'])) {

        if ($_GET['hal'] == "edit") {
            // perintah edit data
            // ubah data
        $ubah = mysqli_query($koneksi, "UPDATE tbl_departemen set nama_departemen = '$_POST[nama_departemen]' where id_departemen = '$_GET[id])' ");
        if ($ubah) {
            echo "<script>
            alert('ubah Data Sukses');
            document.location='?halaman=departemen';</script>";
        }
        }
        else {
            // simpan data
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_departemen VALUES ('', '$_POST[nama_departemen]') ");
        if ($simpan) {
            echo "<script>
            alert('Simpan Data Sukses');
            document.location='?halaman=departemen';</script>";
        }
        }

    
    }

    if (isset($_GET['hal'])) {

        if ($_GET['hal'] == "edit") {
            
            // tampilkan data yang akan dibuat
            $tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen where id_departemen='$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if ($data) {
                $vnama_departemen = $data['nama_departemen'];
            }
        } else {
            $hapus = mysqli_query($koneksi, "DELETE from tbl_departemen where id_departemen='$_GET[id]'");
            if ($hapus) {
                echo "<script>
                alert('Hapus Data Sukses');
                document.location = '?halaman=departemen';
                </script>";
            }
        }


    }

?>
<div class="card">
    <div class="card-header bg-info text_white">
        From Data Departemen
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label for="nama_pengirim">Nama Departemen</label>
                <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" " aria-describedby="
                    emailHelp" value="<?=@$vnama_departemen?>" required>
            </div>

            <button type="submit" name="bsimpan" class="btn btn-primary">Submit</button>
            <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text_white">
        Data Departemen
    </div>
    <div class="card-body">
        <table class="table table-borderd table-hovered table-striped" id="datatablesSimple">
            <tr>
                <th>No</th>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen order by id_departemen desc ");
                $no = 1;
                while($data = mysqli_fetch_array($tampil)) :
                    

                    ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data['nama_departemen']?></td>
                <td>
                    <a href="?halaman=departemen&hal=edit&id=<?=$data['id_departemen']?>"
                        class="btn btn-success">Edit</a>
                    <a href="?halaman=departemen&hal=hapus&id=<?=$data['id_departemen']?>" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data ini?')">Hapus</a>
                </td>

                <?php endwhile; ?>
        </table>
    </div>
</div>
</div>
</div>