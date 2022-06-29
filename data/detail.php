<?php
require 'koneksi.php';
//ambil id dari url
$id = $_GET['id'];
//  $biodata = query("SELECT data_diri.*,pendidkan.tk,pendidkan.sd,pendidkan.smp,pendidkan.sma_smk,pendidkan.perguruan_tinggi
//  FROM data_diri
//  INNER JOIN pendidkan ON data_diri.id_utama = pendidkan.id_utama WHERE data_diri.id_utama = $id;");
$biodata = query("SELECT * FROM data_diri WHERE data_diri.id_utama = $id");
$keahlian = query("SELECT nama_keahlian,keterangan FROM keahlian WHERE keahlian.id_utama = $id");
$pendidkan =  query("SELECT riwayat_pendidikan,nama_pendidikan FROM pendidkan WHERE pendidkan.id_utama = $id");
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
            color: navy;
        }
        #darkmode h1{
            color: #3498DB;
        }
        #darkmode h3{
            color: white;
        }
        /*#darkmode .card-body{
          background-color: grey;
        }
        #darkmode .card-header{
          background-color: gold;
        }*/
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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-h5="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="home.php"><i class="fa-solid fa-backward" style="padding-right: 10px;"></i>Home</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../login/tampilan/logout.php">Log out</a></li>
      </ul>
    </div>
  </nav>
  <!-- Page Content-->

  <section class="section about-section dark-bg resume-section" id="about" style="padding-left:180px;">
    <div class="container resume-section-content">
      <div class="container-xl px-2 mt-1">
        <!-- Account page navigation-->
        <div class="row">
          <div class="col-xl-10">
            <!-- Account details card-->
            <div class="card mb-4">
              <div class="card-header">Account Details</div>
              <div class="card-body">
                <form>
                  <!-- Form Row-->
                  <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                      <h5 for="">nama</h5>
                      <p><?= $biodata["nama"]; ?></p>

                    </div>
                    <div class="col-md-6">
                      <h5 for="">email</h5>
                      <p><?= $biodata["email"]; ?></p>

                    </div>
                    <div class="col-md-6">
                      <h5 for="">Tempat</h5>
                      <p><?= $biodata["tempat"]; ?></p>

                    </div>
                    <div class="col-md-6">
                      <h5 for="">Tgl lahir</h5>
                      <p><?= $biodata["tgl_lahir"]; ?></p>

                    </div>
                    <div class="col-md-6">
                      <h5 for="">no tlp</h5>
                      <p><?= $biodata["no_tlp"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5 for="">Jenis kelamin</h5>
                      <p><?= $biodata["jenis_kelamin"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5 for="">Gol darah</h5>
                      <p><?= $biodata["gol_darah"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5 for="">Alamat</h5>
                      <p><?= $biodata["alamat"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>Kelurahan</h5>
                      <p><?= $biodata["kel_desa"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>kecamatan</h5>
                      <p><?= $biodata["kecamatan"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>Agama</h5>
                      <p><?= $biodata["agama"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>Status perkawinan</h5>
                      <p><?= $biodata["status_perkawinan"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>Pekerjaan</h5>
                      <p><?= $biodata["pekerjaan"]; ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>Kewarganegaraan</h5>
                      <p><?= $biodata["kewarganegaraan"]; ?></p>
                    </div>
                    <hr>
                    <div class="col-md-6">
                      <h5>nama keahlian</h5>
                      <?php 
                      for($i=0;$i<sizeof($keahlian);$i++){
                        ?>
                        <p> <?= $keahlian[$i]["nama_keahlian"]; ?></p>
                      <?php } ?>
                      
                    </div>
                    <div class="col-md-6">
                      <h5>keterangan</h5>
                      <?php 
                      for($i=0;$i<sizeof($keahlian);$i++){
                        ?>
                        <p> <?= $keahlian[$i]["keterangan"]; ?></p>
                      <?php } ?>
                    </div>
                    <hr>
                    <div class="col-md-12">
                      <h5>Riwayat Pendidikan :</h5>
                    </div>
                    <div class="col-md-6">
                       <?php 
                       for($i=0;$i<sizeof($pendidkan);$i++){
                        ?>
                        <p> <?= $pendidkan[$i]["riwayat_pendidikan"]; ?></p>
                      <?php } ?>
                    </div>
                    <div class="col-md-6">
                      <h5></h5>
                       <?php 
                       for($i=0;$i<sizeof($pendidkan);$i++){
                        ?>
                        <p> <?= $pendidkan[$i]["nama_pendidikan"]; ?></p>
                      <?php } ?>
                    </div>
                  </div>
                </form>
                <div class="tombol">
                  <button id="button" class="btn btn-warning btn-sm"><a href="ubah.php?id=<?= $biodata['id_utama']; ?>" style="color: white;  text-decoration :none;"><i class="fa-solid fa-pen-to-square" style="padding-right: 10px;"></i>Ubah</a></button>
                  <button id="button" class="btn btn-danger btn-sm"><a href="hapus.php?id=<?= $biodata['id_utama']; ?>" style="color: white; text-decoration :none;" onclick="return confirm('Apakah anda yakin ingin menghapus data ?');"><i class="fa-solid fa-trash-can" style="padding-right: 10px;"></i>Delete</a></button>
                  <!-- <button id="button" class="btn btn-primary btn-sm justify-content-center"><a href="home.php" style="color: white;  text-decoration :none;"><i class="fa-solid fa-backward" style="padding-right: 10px;"></i>Kembali</a></button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>
  <!-- Bootstrap core JS-->
  <link rel="stylesheet" href="/js/bootstrap.min.js">
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>