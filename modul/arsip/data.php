<div class="card">
    <div class="card-header bg-info text_white">
        Data Arsip Surat
    </div>
    <div class="card-body">
        <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-info mb-3">Tambah Data</a>
        <a href="./modul/arsip/cetak_surat_arsip.php" class="btn btn-warning mb-3" style="color: yellow;">Print</a>
        <table class="table table-borderd table-hovered table-striped">
            <tr>
                <th>NO</th>
                <th>No Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Diterima</th>
                <th>Perihal</th>
                <th>Departemen / Tujuan</th>
                <th>Pengirim</th>
                <th>Aksi</th>

            </tr>
            <?php 
                $tampil = mysqli_query($koneksi, "SELECT tbl_arsip.*, tbl_departemen.nama_departemen,
                tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                from tbl_arsip, tbl_departemen, tbl_pengirim_surat where tbl_arsip.id_departemen = tbl_departemen.id_departemen and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim");
                $no = 1;
                while($data = mysqli_fetch_array($tampil)) :

                    ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data['no_surat']?></td>
                <td><?=$data['tanggal_surat']?></td>
                <td><?=$data['tanggal_diterima']?></td>
                <td><?=$data['perihal']?></td>
                <td><?=$data['nama_departemen']?></td>
                <td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
                <td><a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-success">Edit</a>
                    <a href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data ini?')">Hapus</a>
                </td>

                <?php endwhile; ?>
        </table>
    </div>
</div>