<?php
require 'koneksi.php';

//pastikan tombol tambah sudah ditekan
if (isset($_POST['addsubmit'])) {
  if (addsubmit($_POST) > 0) {
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
            <span class="icon" onclick="setDarkMode(false)"><button type="button" style="" class="btn btn-light btn-sm">light</button></span> ||
          <span class="icon" onclick="setDarkMode(true)"><button type="button" class="btn btn-secondary btn-sm">Dark</button></span>
      </p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav" style="text-align: left; padding-left:58.5px;">
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="home.php"><i class="fa-solid fa-house-user"  style="padding-right: 8px;"></i>Home</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login/tampilan/index.php"><i class="fa-solid fa-right-from-bracket" style="padding-right: 8px;"></i>Log out</a></li>

      </ul>
    </div>
  </nav>
  <!-- Page Content-->
  <h3 style="padding-left:20px;">Add Data</h3>
  <form class="row g-3" action="" method="POST" style="margin-left:20px; color:black;">
    <table id="keahlian" class="col-md-5 row g-3">
      <script src="tambah.js"></script>
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

    <hr style="color:black; ">
    <table id="pendidikan" class="col-md-5 row g-3">
      <script src="tambah.js"></script>
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
      <button class="btn btn-warning" style="width:10rem;margin: 0 auto; " type="submit" name="addsubmit">Submit</button>

  </form>
  <!-- Bootstrap core JS-->
  <link rel="stylesheet" href="/js/bootstrap.min.js">
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>