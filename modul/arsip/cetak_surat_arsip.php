<?php
require '../../vendor/autoload.php';
require '../../config/koneksi.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Ambil data dari database
$sql = "SELECT tbl_arsip.*, tbl_departemen.nama_departemen,
                tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
        FROM tbl_arsip
        JOIN tbl_departemen ON tbl_arsip.id_departemen = tbl_departemen.id_departemen
        JOIN tbl_pengirim_surat ON tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim";

$result = mysqli_query($koneksi, $sql);

$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cetak Data Arsip Surat</title>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
      font-size: 12pt;
      padding: 40px;
      line-height: 1.6;
      color: #000;
    }
    h2 {
      text-align: center;
      font-size: 16pt;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #000;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
    }
    th, td {
      border: 1px solid #000;
      padding: 10px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    .footer {
      margin-top: 50px;
      font-size: 11pt;
      text-align: right;
    }
  </style>
</head>
<body>
  <h2>DATA ARSIP SURAT</h2>

  <table>
    <thead>
      <tr>
        <th>No Surat</th>
        <th>Tanggal Surat</th>
        <th>Tanggal Diterima</th>
        <th>Perihal</th>
        <th>Nama Departemen</th>
        <th>Nama Pengirim</th>
        <th>Nomor Handphone</th>
      </tr>
    </thead>
    <tbody>
HTML;

// Loop data dari database dan buat baris tabel
while ($data = mysqli_fetch_assoc($result)) {
    $html .= "<tr>
        <td>{$data['no_surat']}</td>
        <td>{$data['tanggal_surat']}</td>
        <td>{$data['tanggal_diterima']}</td>
        <td>{$data['perihal']}</td>
        <td>{$data['nama_departemen']}</td>
        <td>{$data['nama_pengirim']}</td>
        <td>{$data['no_hp']}</td>
      </tr>";
}

$html .= "
    </tbody>
  </table>
</body>
</html>
";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("arsip_surat.pdf", ["Attachment" => false]);
exit;