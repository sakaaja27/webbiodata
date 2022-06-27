<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location:../data/index.php");
}

?>
<?php
// Koneksi ke DB & Pilih Database
$conn = mysqli_connect('localhost', 'root', '', 'biodata');

// Query isi tabel 
$result = mysqli_query($conn, "SELECT * FROM data_diri");

// ubah data ke dalam array
// $row = mysqli_fetch_row($result); // array numerik
// $row = mysqli_fetch_assoc($result); // array associative
// $row = mysqli_fetch_array($result); // keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
// tampung ke variabel karyawan
$biodata = $rows;
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
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">

            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../cv/saka.jpg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#biodata">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#tambahdata">tambahdata</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>

            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- home -->
        <section class="resume-section" id="home">
            <div class="resume-section-content">
                <span><?php echo "<h1>Selamat Datang, " . $_SESSION['username'] . "!" . "</h1>"; ?></span>
                <div class="subheading mb-5">
                    <!-- Jl Mangga No.40, Sumber Wetan , Kedopok,Probolinggo +6285760199917 · -->

                </div>
                <p class="lead mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi similique cupiditate minus iure aliquam dicta..</p>
                <div class="social-icons">
                    <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- About-->
        <section class="resume-section" id="biodata">
            <div class="resume-section-content">
               
                <h3>Daftar karyawan</h3>

                <table class="table table-success table-striped">
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>tempat_tgl_lahir</th>
                        <th>jenis kelamin</th>
                        <th>alamat</th>
                        <th colspan="3">aksi</th>
                    </tr>
                    <?php $i = 1;
                    foreach ($biodata as $m) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $m['id_utama']; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['tempat_tgl_lahir']; ?></td>
                            <td><?= $m['jenis_kelamin']; ?></td>
                            <td><?= $m['alamat']; ?></td>
                            <td><a href="detail.php?id=<?= $m['id_utama']; ?>">detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a href="tambah.php">Tambah data</a>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <!-- <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Experience</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Senior Web Developer</h3>
                        <div class="subheading mb-3">Intelitec Solutions</div>
                        <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">March 2013 - Present</span></div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Web Developer</h3>
                        <div class="subheading mb-3">Intelitec Solutions</div>
                        <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">December 2011 - March 2013</span></div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Junior Web Designer</h3>
                        <div class="subheading mb-3">Shout! Media Productions</div>
                        <p>Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">July 2010 - December 2011</span></div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Web Design Intern</h3>
                        <div class="subheading mb-3">Shout! Media Productions</div>
                        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">September 2008 - June 2010</span></div>
                </div>
            </div>
        </section> -->
        <hr class="m-0" />
        <!-- Education-->
        <!-- <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">Education</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">SMPN 6 Kota Probolinggo</h3>
                        <div class="subheading mb-3">IT</div>
                        <div>Computer Science - Web Development Track</div>
                        <p>GPA: 3.23</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">June 2016 - May 2019</span></div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">SMKN 1 Kota Probolinggo</h3>
                        <div class="subheading mb-3">Software Engenering</div>
                        <p>GPA: 3.56</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">June 2020 - 2023</span></div>
                </div>
            </div>
        </section> -->
        <hr class="m-0" />
        <!-- Skills-->
        <!-- <section class="resume-section" id="skills">
            <div class="resume-section-content">
                <h2 class="mb-5">Skills</h2>
                <div class="subheading mb-3">Programming Languages & Tools</div>
                <ul class="list-inline dev-icons">
                    <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                    <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                    <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                    <!-- <li class="list-inline-item"><i class="fab fa-angular"></i></li>
                        <li class="list-inline-item"><i class="fab fa-react"></i></li>
                        <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                        <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                        <li class="list-inline-item"><i class="fab fa-less"></i></li>
                        <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                        <li class="list-inline-item"><i class="fab fa-gulp"></i></li>
                        <li class="list-inline-item"><i class="fab fa-grunt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-npm"></i></li> -->
        </ul>
        <div class="subheading mb-3">Workflow</div>
        <ul class="fa-ul mb-0">
            <li>
                <span class="fa-li"><i class="fas fa-check"></i></span>
                Mobile-First, Responsive Design
            </li>
            <li>
                <span class="fa-li"><i class="fas fa-check"></i></span>
                Cross Browser Testing & Debugging
            </li>
            <li>
                <span class="fa-li"><i class="fas fa-check"></i></span>
                Cross Functional Teams
            </li>
            <li>
                <span class="fa-li"><i class="fas fa-check"></i></span>
                Agile Development & Scrum
            </li>
        </ul>
    </div>
    </section> -->
    <hr class="m-0" />
    </div>
    <!-- Bootstrap core JS-->
   <link rel="stylesheet" href="/js/bootstrap.min.js">
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>