<?php
require 'koneksi.php';

//ambil id dari url
$id = $_GET['id'];

//query berdasarkan id
// $biodata = query("SELECT data_diri.*,keahlian.nama_keahlian,keahlian.keterangan,pendidkan.riwayat_pendidikan,pendidkan.nama_pendidikan
// FROM (data_diri INNER JOIN keahlian ON data_diri.id_utama = keahlian.id_utama ) 
// INNER JOIN pendidkan ON data_diri.id_utama = pendidkan.id_utama  
// AND data_diri.id_utama = $id;");
$biodata = query("SELECT * FROM data_diri WHERE data_diri.id_utama = $id");
$keahlian = query("SELECT nama_keahlian,keterangan FROM keahlian WHERE keahlian.id_utama = $id");
$pendidkan =  query("SELECT riwayat_pendidikan,nama_pendidikan FROM pendidkan WHERE pendidkan.id_utama = $id");


//pastikan tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST, $id) > 0) {
    echo "<script>
    alert('data berhasil diubah');
    document.location.href = 'home.php';
    </script>";
  } else {
    echo "Data gagal diubah";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>CV</title>

  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" href="">
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="detail.css">
</head>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
   <style type="text/css">
    #darkmode {
      background:#212F3C;
      color: white;
    }
    #darkmode h5{
      color: #3498DB;
    }
    #darkmode h3{
      color: white;
    }
    #darkmode label{
      color: white;
    }
    #darkmode hr {
      color: white;
    }
  </style>
  <script type="text/javascript">
    if (localStorage.getItem('theme')== 'dark')
      setDarkMode(true)
    function setDarkMode(isDark) {
      if (isDark) {
        document.body.setAttribute('id','darkmode')
        localStorage.setItem('theme','dark')
      }else {
        document.body.setAttribute('id','')
        localStorage.removeItem('theme')
      }

                // body...
              }
            </script>
            <a class="navbar-brand js-scroll-trigger" href="#page-top">

              <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../img/admin.png" alt="..." /></span>
            </a>
            <p>
              <span class="icon" onclick="setDarkMode(false)"><button type="button" style="" class="btn btn-outline-light">light</button></span> ||
              <span class="icon" onclick="setDarkMode(true)"><button type="button" class="btn btn-outline-info">Dark</button></span>
            </p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login/tampilan/index.php">Log out</a></li>
              </ul>
            </div>
          </nav>
          <!-- Page Content-->
          <h3 style="padding-left:20px;">Ubah data</h3>
          <form class="row g-3" action="" method="POST" style="padding  :20px; color:black;">
            <input type="hidden" class="form-control" name="id_utama" id="validationDefault01" value="<?= $biodata['id_utama']; ?>" autofocus required>
            <div class="col-md-3">
              <label for="validationDefault01" class="form-label">Namamu mas/mbak</label>
              <input type="text" class="form-control" name="nama" id="validationDefault01" value="<?= $biodata['nama']; ?>" autofocus required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">tempat</label>
              <input type="text" class="form-control" name="tempat" id="validationDefault02" value="<?= $biodata['tempat'] ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">tgl lahir</label>
              <input type="date" class="form-control" name="tgl_lahir" id="validationDefault02" value="<?= $biodata['tgl_lahir'] ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">no tlp</label>
              <input type="text" class="form-control" name="no_tlp" id="validationDefault02" value="<?= $biodata['no_tlp'] ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">email</label>
              <input type="text" class="form-control" name="email" id="validationDefault02" value="<?= $biodata['email'] ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault04" class="form-label">Jenis kelamin</label>
              <select class="form-select" name="jenis_kelamin" id="validationDefault04" required>
                <option disabled value="<?= $biodata['jenis_kelamin']; ?>">Pilih</option>
                <option <?= $biodata['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                <option <?= $biodata['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
              </select>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">Gol darah</label>
              <input type="text" class="form-control" name="gol_darah" id="validationDefault02" value="<?= $biodata['gol_darah']; ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault03" class="form-label">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="validationDefault03" value="<?= $biodata['alamat']; ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">Kelurahan</label>
              <input type="text" class="form-control" name="kel_desa" id="validationDefault02" value="<?= $biodata['kel_desa']; ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">Kecamatan</label>
              <input type="text" class="form-control" name="kecamatan" id="validationDefault02" value="<?= $biodata['kecamatan']; ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">Agama</label>
              <input type="text" class="form-control" name="agama" id="validationDefault02" value="<?= $biodata['agama']; ?>" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault04" class="form-label">Status perkawinan</label>
              <select class="form-select" name="status_perkawinan" id="validationDefault04" required>
                <option selected disabled value="<?= $biodata['status_perkawinan']; ?>">Pilih</option>
                <option <?= $biodata['status_perkawinan'] == 'tidak menikah' ? 'selected' : ''; ?>>tidak menikah</option>
                <option <?= $biodata['status_perkawinan'] == 'menikah' ? 'selected' : ''; ?>>menikah</option>
              </select>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">Pekerjaan</label>
              <input type="text" class="form-control" name="pekerjaan" id="validationDefault02" value="<?= $biodata['pekerjaan']; ?>" required>
            </div>

            <div class="col-md-3">
              <label for="validationDefault02" class="form-label">Kewarganegaraan</label>
              <input type="text" class="form-control" name="kewarganegaraan" id="validationDefault02" value="<?= $biodata['kewarganegaraan']; ?>" required>
            </div>
            <div class="button">
              <button class="btn btn-outline-warning"><a href="#next" style="text-decoration:none;">next</a></button>
            </div>
            <hr style="color:black; height:30px;" id="next" >
            <div class="col-md-4">
             <h5>nama keahlian</h5>
             <?php 
             for($i=0;$i<sizeof($keahlian);$i++){
              ?>
              <input type="text" class="form-control" name="nama_keahlian" id="validationDefault02" value="<?= $keahlian[$i]["nama_keahlian"]; ?>">
            <?php } ?>
          </div>
          <div class= "col-md-4">
            <h5>keterangan</h5>
            <?php 
            for($i=0;$i<sizeof($keahlian);$i++){
              ?>
              <input type="text" class="form-control" name="keterangan" id="validationDefault02" value="<?= $keahlian[$i]["keterangan"]; ?>">
            <?php } ?>
            <br><br>
          </div>
          <hr style="color:black; height:30px;" id="next" >
          <div class="col-md-4">
             <h5>riwayat pendidikan</h5>
             <?php 
             for($i=0;$i<sizeof($pendidkan);$i++){
              ?>
              <input type="text" class="form-control" name="riwayat_pendidikan" id="validationDefault02" value="<?= $pendidkan[$i]["riwayat_pendidikan"]; ?>">
            <?php } ?>
          </div>
          <div class= "col-md-4">
            <h5>nama pendidikan</h5>
            <?php 
            for($i=0;$i<sizeof($pendidkan);$i++){
              ?>
              <input type="text" class="form-control" name="nama_pendidikan" id="validationDefault02" value="<?= $pendidkan[$i]["nama_pendidikan"]; ?>">
            <?php } ?>
            <br><br>
          </div>
          <div class="button">
            <button class="btn btn-primary" type="submit" name="ubah">Ubah form</button>
          </div>
          <br>
        </form>
        <!-- Bootstrap core JS-->
        <link rel="stylesheet" href="/js/bootstrap.min.js">
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
      </body>

      </html>