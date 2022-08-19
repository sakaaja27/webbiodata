<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'koneksi.php';
//pagination
//konfigurasi
$biodata = query("SELECT * FROM data_diri");

$html = '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Detail Karyawan</title>
<link rel="stylesheet" href="print.css">
</head>
<body>
<h1>Daftar Karyawan</h1>
<table border="1" cellpadding="10" cellspacing="0">
<tr class="table-dark text-center">
<th>No</th>
<th>Nama</th>
<th>tempat</th>
<th>tgl lahir</th>
<th>jenis kelamin</th>
<th>alamat</th>
</tr>';
$i = 1;
foreach ($biodata as $m){
	$html .= '<tr>
	 <td>'. $i++ .'</td>
	 <td>'. $m["nama"].'</td>
	 <td>'. $m["tempat"].'</td>
	 <td>'. $m["tgl_lahir"].'</td>
	 <td>'. $m["jenis_kelamin"].'</td>
	 <td>'. $m["alamat"].'</td>
	</tr>';

}
$html .='</table>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);

$mpdf->Output('daftar-karyawan.pdf', \Mpdf\Output\Destination::INLINE);
?>
