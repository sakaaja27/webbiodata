 <?php

 session_start();

 if (!isset($_SESSION['username'])) {
    header("Location:../data/home.php");
}

//ketika tombol cari diklik

?>
<?php
require 'koneksi.php';
//pagination
//konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM data_diri"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// halaman = 2 awal data = 3
$awaldata = ($jumlahDataPerHalaman * $halamanaktif) - $jumlahDataPerHalaman;
$biodata = query("SELECT * FROM data_diri LIMIT $awaldata, $jumlahDataPerHalaman");

if (isset($_POST["cari"])) {
    $biodata = cari2($_POST["keyword"]);
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

    <style>
        @media print {
            #button {
                display: none;
            }

            #home {
                display: none;
            }

            .aksi {
                display: none;
            }
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
<!--         <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" onclick="setDarkMode(true)"  checked>
          <label class="form-check-label" for="flexSwitchCheckChecked" ></label>
      </div> -->

      <style type="text/css">
        #darkmode {
            background:#212F3C;
            color: white;
        }
        #darkmode h1{
            color: #3498DB;
        }
        #darkmode h3{
            color: white;
        }
        #darkmode{

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
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#biodata">daftar</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../login/tampilan/logout.php">Log out</a></li>

        </ul>
    </div>
</nav>
<!-- Page Content-->
<div class="container-fluid p-3">
    <!-- home -->
    <section class="resume-section" id="home">
        <div class="resume-section-content">
            <span><?php echo "<h1>Selamat Datang, "  . $_SESSION['username'] . "!" . "</h1>"; ?></span>
            <p class="lead mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi similique cupiditate minus iure aliquam dicta..</p>
        </div>
    </section>
    <!-- About-->
    <section class="resume-section" id="biodata">
        <div class="resume-section-content">
            <h3>Daftar karyawan</h3>
            <nav class="navbar navbar-light">
                <div class="container-fluid">
                    <form action="" method="post" class="d-flex">
                        <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="cari">Search</button>
                    </form>
                </div>
            </nav>
            <!-- navigasi -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($i  = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanaktif) : ?>
                            <li class="page-item active"> <a class="page-link" href="?halaman=<?= $i; ?>" style="font-weight:bold; text-decoration:none; color:white;"><?= $i; ?></a></li>
                        <?php else : ?>
                            <li class="page-item"><a  class="page-link" href="?halaman=<?= $i; ?>" style="text-decoration:none; "><?= $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                </ul>
            </nav>
            <table class="table table-bordered  table-striped ">
                <tr class="table-dark text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>tempat</th>
                    <th>tgl lahir</th>
                    <th>jenis kelamin</th>
                    <th>alamat</th>
                    <th colspan="4" class="aksi">aksi</th>
                </tr>
                <?php if (empty($biodata)) : ?>
                    <tr class="table-warning">
                        <td colspan="7">tidak ada data</td>
                    </tr>
                <?php endif; ?>
                <?php $i = 1;
                foreach ($biodata as $m) : ?>
                    <tr class="table-light">
                        <td><?= $i++; ?></td>
                        <td><?= $m['nama']; ?></td>
                        <td><?= $m['tempat']; ?></td>
                        <td><?= $m['tgl_lahir']; ?></td>
                        <td><?= $m['jenis_kelamin']; ?></td>
                        <td><?= $m['alamat']; ?></td>

                        <td class="aksi"> <button type="button" class="btn btn-outline-info"> <a href="detail.php?id=<?= $m['id_utama']; ?>" style="text-decoration:none; color:;">Detail</a></td></button>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button type="button" id="button" class="btn btn-outline-warning"> <a href="tambah.php" style="text-decoration:none;"><i class="fa-solid fa-user-plus" style="padding-right:10px;"></i>Tambah data</a></button>

        </div>
    </section>
    <hr class="m-0" />
</div>
<!-- Bootstrap core JS-->
<link rel="stylesheet" href="/js/bootstrap.min.js">
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>

</html>