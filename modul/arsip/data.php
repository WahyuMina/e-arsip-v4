<div class="card">
    <div class="card-header bg-info text_white">
        Data Arsip Surat
    </div>
    <div class="card-body">
        <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-info mb-3">Tambah Data</a>
        <button onClick="window.print()" class="btn btn-primary mb-3" id="printTable">Print</button>
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
        <script type="text/javascript">
        <!--
        function printContent(id) {
            str = document.getElementById(id).innerHTML
            newwin = window.open('', 'printwin', 'left=100,top=100,width=400,height=400')
            newwin.document.write('<HTML>\n<HEAD>\n')
            newwin.document.write('<TITLE>Print Page</TITLE>\n')
            newwin.document.write('<script>\n')
            newwin.document.write('function chkstate(){\n')
            newwin.document.write('if(document.readyState=="complete"){\n')
            newwin.document.write('window.close()\n')
            newwin.document.write('}\n')
            newwin.document.write('else{\n')
            newwin.document.write('setTimeout("chkstate()",2000)\n')
            newwin.document.write('}\n')
            newwin.document.write('}\n')
            newwin.document.write('function print_win(){\n')
            newwin.document.write('window.print();\n')
            newwin.document.write('chkstate();\n')
            newwin.document.write('}\n')
            newwin.document.write('<\/script>\n')
            newwin.document.write('</HEAD>\n')
            newwin.document.write('<BODY onload="print_win()">\n')
            newwin.document.write(str)
            newwin.document.write('</BODY>\n')
            newwin.document.write('</HTML>\n')
            newwin.document.close()
        }
        //
        -->
        </script>

    </div>
</div>