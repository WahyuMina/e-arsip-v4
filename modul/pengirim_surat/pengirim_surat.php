<?php
    if (isset($_POST['bsimpan'])) 
    {
        if (@$_GET['hal'] == "edit") {
            # perintah edit data
            // UBAH DATAA
            $ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim_surat set nama_pengirim = '$_POST[nama_pengirim]',
            alamat = '$_POST[alamat]',
            no_hp = '$_POST[no_hp]',
            email = '$_POST[email]' 
            where id_pengirim = '$_GET[id]' ");
            if ($ubah) {
                echo "<script>
                    alert('Ubah Data Sukses');
                    document.location='?halaman=pengirim_surat';
                </script>";
            }
            else {
                echo "<script>
                    alert('Ubah Data GAGAL!');
                    document.location='?halaman=pengirim_surat';
                </script>";
            }
        } else{
                 $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat VALUES ('', '$_POST[nama_pengirim]',
                 '$_POST[alamat]',
            '$_POST[no_hp]',
            '$_POST[email]'
            )");
            if ($simpan) {
                echo "<script>
                    alert('Simpan Data Sukses');
                    document.location='?halaman=pengirim_surat';
                </script>";
            } else {
                echo "<script>
                    alert('Simpan Data GAGAL!');
                    document.location='?halaman=pengirim_surat;</script>";
            }
        }
    }

    if (isset($_GET['hal'])) 
    {
        if ($_GET['hal'] == "edit")
         {
             $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat where id_pengirim='$_GET[id]'");
             $data = mysqli_fetch_array($tampil);
             if ($data) {
                 $vnama_pengirim = $data['nama_pengirim'];
                 $valamat = $data['alamat'];
                 $vno_hp = $data['no_hp'];
                 $veamil = $data['email'];
             }
        } else 
        {
            $hapus = mysqli_query($koneksi, "DELETE from tbl_pengirim_surat where id_pengirim='$_GET[id]'");
            if ($hapus) {
               echo "<script>
                    alert('Hapus Data Sukses');
                    document.location='?halaman=pengirim_surat';
                </script>";
            }
        }
    }
?>
<div class="card">
    <div class="card-header bg-info text_white">
        From Data Pengirim Surat
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label for="nama_pengirim">Nama Pengirim</label>
                <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim"
                    value="<?=@$vnama_pengirim?>" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="nama_pengirim">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?=@$valamat?>"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="nama_pengirim">No. HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?=@$vno_hp?>"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="nama_pengirim">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?=@$veamil?>"
                    aria-describedby="emailHelp" required>
            </div>

            <button type="submit" name="bsimpan" class="btn btn-primary">Submit</button>
            <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text_white">
        Data Pengirim Surat
    </div>
    <div class="card-body">
        <table class="table table-borderd table-hovered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Pengirim SUrat</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php 
                $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by id_pengirim desc");
                $no = 1;
                while($data = mysqli_fetch_array($tampil)) :

                    ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data['nama_pengirim']?></td>
                <td><?=$data['alamat']?></td>
                <td><?=$data['no_hp']?></td>
                <td><?=$data['email']?></td>
                <td><a href="?halaman=pengirim_surat&hal=edit&id=<?=$data['id_pengirim']?>"
                        class="btn btn-success">Edit</a>
                    <a href="?halaman=pengirim_surat&hal=hapus&id=<?=$data['id_pengirim']?>" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data ini?')">Hapus</a>
                </td>

                <?php endwhile; ?>
        </table>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>