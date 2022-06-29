<?php
function koneksi()
{
  // Koneksi ke DB & Pilih Database
  return mysqli_connect ('localhost', 'root', '', 'biodata');
}
function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data aja ya bund
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function submit($data)
{
  $conn = koneksi();
  $nama = htmlspecialchars($data['nama']);
  $tempat = $data['tempat'];
  $tgl_lahir = $data['tgl_lahir'];
  $no_tlp = $data['no_tlp'];
  $email = $data['email'];
  $jenis_kelamin = $data['jenis_kelamin'];
  $gol_darah = $data['gol_darah'];
  $alamat = $data['alamat'];
  $kel_desa = $data['kel_desa'];
  $kecamatan = $data['kecamatan'];
  $agama = $data['agama'];
  $status_perkawinan = $data['status_perkawinan'];
  $pekerjaan = $data['pekerjaan'];
  $kewarganegaraan = $data['kewarganegaraan'];
  $nama_keahlian = $data['nama_keahlian'];
  $keterangan = $data['keterangan'];
  $riwayat_pendidikan = $data['riwayat_pendidikan'];
  $nama_pendidikan = $data['nama_pendidikan'];

  $query1  =  " INSERT INTO data_diri VALUES (null,'$nama','$tempat','$tgl_lahir','$no_tlp','$email','$jenis_kelamin','$gol_darah','$alamat','$kel_desa','$kecamatan','$agama','$status_perkawinan','$pekerjaan','$kewarganegaraan') ";
  if ($conn->query($query1) == TRUE) {
    $last_id = $conn->insert_id;
    for($i=0;$i<sizeof($nama_keahlian);$i++){
        
      $query2 = "INSERT INTO keahlian  VALUES (null,'$last_id','$nama_keahlian[$i]','$keterangan[$i]')";
      mysqli_query($conn, $query2);
    }
    for($i=0;$i<sizeof($riwayat_pendidikan);$i++){
      $query3 = "INSERT INTO pendidkan  VALUES (null,'$last_id','$riwayat_pendidikan[$i]','$nama_pendidikan[$i]')";
      mysqli_query($conn, $query3);   
    }
   
  }
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
  $conn->close();
  
  //  mysqli_multi_query($conn, $query);

}

function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE data_diri,keahlian,pendidkan FROM data_diri INNER JOIN keahlian ON data_diri.id_utama = keahlian.id_utama INNER JOIN pendidkan on data_diri.id_utama= pendidkan.id_utama AND data_diri.id_utama=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data, $id)
{
 

  $conn = koneksi();
  $id_utama = $data['id_utama'];
  $nama = htmlspecialchars($data['nama']);
  $tempat = $data['tempat'];
  $tgl_lahir = $data['tgl_lahir'];
  $no_tlp = $data['no_tlp'];
  $email = $data['email'];
  $jenis_kelamin = $data['jenis_kelamin'];
  $gol_darah = $data['gol_darah'];
  $alamat = $data['alamat'];
  $kel_desa = $data['kel_desa'];
  $kecamatan = $data['kecamatan'];
  $agama = $data['agama'];
  $status_perkawinan = $data['status_perkawinan'];
  $pekerjaan = $data['pekerjaan'];
  $kewarganegaraan = $data['kewarganegaraan'];
  $nama_keahlian = $data['nama_keahlian'];
  $keterangan = $data['keterangan'];
  $riwayat_pendidikan = $data['riwayat_pendidikan'];
  $nama_pendidikan = $data['nama_pendidikan'];

  $query = "UPDATE data_diri,keahlian,pendidkan SET 
              nama = '$nama',
              tempat = '$tempat',
              tgl_lahir = '$tgl_lahir',
              no_tlp = '$no_tlp',
              email ='$email',
              jenis_kelamin = '$jenis_kelamin',
              gol_darah = '$gol_darah',
              alamat = '$alamat',
              kel_desa = '$kel_desa',
              kecamatan = '$kecamatan',
              agama = '$agama',
              status_perkawinan = '$status_perkawinan',
              pekerjaan = '$pekerjaan',
              kewarganegaraan = '$kewarganegaraan',
              nama_keahlian = '$nama_keahlian',
              keterangan = '$keterangan',
              riwayat_pendidikan = '$riwayat_pendidikan',
              nama_pendidikan = '$nama_pendidikan'
            WHERE data_diri.id_utama  = $id AND keahlian.id_utama = $id AND pendidkan.id_utama = $id";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function cari2($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM data_diri WHERE nama LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
