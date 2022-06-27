<?php
require 'koneksi.php';

//pastikan tombol tambah sudah ditekan
if (isset($_POST['submit'])) {
  if (submit($_POST) > 0) {
    echo "<script>
           alert('data berhasil ditambahkan ayo dung ngangkat');
           document.location.href = 'home.php';
         </script>";
  } else {
    echo "Data gagal ditambahkan";
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
        #darkmode h1{
            color: #3498DB;
        }
        #darkmode th{
            color: #3498DB;
        }
        #darkmode h3{
            color: white;
        }
        #darkmode label{
          color: #3498DB;
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
  <h3 style="padding-left:20px;">Tambah data</h3>
  <form class="row g-3" action="" method="POST" style="padding:20px; color:black;">
    <div class="col-md-3">
      <label for="validationDefault01" class="form-label">Namamu mas/mbak</label>
      <input type="text" class="form-control" name="nama" id="validationDefault01" value="" autofocus required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">tempat</label>
      <input type="text" class="form-control" name="tempat" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">tgl lahir</label>
      <input type="date" class="form-control" name="tgl_lahir" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">no tlp</label>
      <input type="text" class="form-control" name="no_tlp" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">email</label>
      <input type="text" class="form-control" name="email" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault04" class="form-label">Jenis kelamin</label>
      <select class="form-select" name="jenis_kelamin" id="validationDefault04" required>
        <option selected disabled value="">Pilih</option>
        <option>Laki-Laki</option>
        <option>Perempuan</option>
      </select>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">Gol darah</label>
      <input type="text" class="form-control" name="gol_darah" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault03" class="form-label">Alamat</label>
      <input type="text" class="form-control" name="alamat" id="validationDefault03" required>
    </div>

    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">Kelurahan</label>
      <input type="text" class="form-control" name="kel_desa" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">Kecamatan</label>
      <input type="text" class="form-control" name="kecamatan" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">Agama</label>
      <input type="text" class="form-control" name="agama" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault04" class="form-label">Status perkawinan</label>
      <select class="form-select" name="status_perkawinan" id="validationDefault04" required>
        <option selected disabled value="">Pilih</option>
        <option>tidak menikah</option>
        <option>menikah</option>
      </select>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">Pekerjaan</label>
      <input type="text" class="form-control" name="pekerjaan" id="validationDefault02" value="" required>
    </div>
    <div class="col-md-3">
      <label for="validationDefault02" class="form-label">Kewarganegaraan</label>
      <input type="text" class="form-control" name="kewarganegaraan" id="validationDefault02" value="" required>
    </div>
    <hr style="color:black; height:30px;">
    <table id="keahlian" class="col-md-5 row g-3">
      <script src="pendidikan.js"></script>
      <tr>
        <th>nama keahlian</th>
        <th>keterangan</th>
      </tr>
      <tr>
        <td id="keahlian0"><input type="text" class="form-control" name="nama_keahlian[]" value="" /></td>
        <td id="keahlian1"><input type="text" class="form-control" name="keterangan[]" value="" /></td>
        <td id="keahlian2">
      </tr>
    </table>
    <div class="button">
      <input type="button" class="btn btn-outline-primary" value="Add" onclick="addRows('keahlian')" />
      <input type="button" class="btn btn-outline-primary" value="Delete" onclick="deleteRows('keahlian')" />
    </div>

    <hr style="color:black; height:30px;">
    <table id="pendidikan" class="col-md-5 row g-3">
      <script src="pendidikan.js"></script>
      <tr>
        <th>riwayat pendidikan</th>
        <th>nama pendidikan</th>
      </tr>
      <tr>
        <td id="pendidikan0"><input type="text" class="form-control" name="riwayat_pendidikan[]" value="" /></td>
        <td id="pendidikan1"><input type="text" class="form-control" name="nama_pendidikan[]" value="" /></td>
        <td id="pendidikan2">
      </tr>
    </table>
    <div class="button">
      <input type="button" class="btn btn-outline-primary" value="Add" onclick="add('pendidikan')" />
      <input type="button" class="btn btn-outline-primary" value="Delete" onclick="del('pendidikan')" />
    </div>

      <br>
      <button class="btn btn-warning" style="width:20%;margin: 0 auto; " type="submit" name="submit">Submit form</button>

  </form>
  <!-- Bootstrap core JS-->
  <link rel="stylesheet" href="/js/bootstrap.min.js">
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>