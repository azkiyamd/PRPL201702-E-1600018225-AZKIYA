<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
Berhasil Login, <a href="logout.php">Logout</a>
<!DOCTYPE html>
<html lang="en" class="full-height">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Restoran Sunda</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">




</head>

<header>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <a class="navbar-brand" href="#"><strong>MADE IN SUNDA</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
            </ul>
        </div>
    </nav>

      <div class="view intro-2" style="">
        <div class="full-bg-img">
            <div class="mask rgba-purple-light">
                <div class="container white-text wow fadeInUp">
                    <br><br><br><br>


    <!--Card-->



    <!--Card content-->
    <div class="card-body text-center">
        <!--Title-->
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <h4 class="card-title"><strong>SELAMAT DATANG DI RUMAH MAKAN MADE IN SUNDA</strong></h4>
        <h5 class="indigo-text"><strong>Cullinary</strong></h5>

        <p class="card-text">Buat orang sunda yang merantau ke Jogja, yuk mari di order
        </p>

        <!--Linkedin-->
        <a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a>
        <!--Twitter-->
        <a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a>
        <!--Dribbble-->
        <a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a>

    </div>
    <!--/.Card content-->



</header>

<!--Main Layout-->
<main class="text-center py-5">

   <!-- Grid row -->
<div class="row">

    <!-- Grid column -->
    <div class="col-md-10 col-lg-9 col-xl-6 mb-r">
        
        <!--Panel-->
        <div class="card card-body mb-3">
            <div class="media d-block d-md-flex">
                <img src="31.jpg" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <?php 
                    $k = mysql_query("SELECT * FROM produk ORDER BY idproduk ASC limit "); 
                    while($data = mysql_fetch_array($k)){
                ?>
                <div class="col-md-4 content-menu">
                    <a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>">
                        <img src="<?php echo $url; ?>uploads/<?php echo $data['gambar'] ?>" width="100%">
                        <h4><?php echo $data['nama'] ?></h4>
                    </a>
                    <p><?php echo $data['deskripsi'] ?></p>
                    <p style="font-size:18px">Harga :<?php echo number_format($data['harga'], 2, ',', '.') ?></p>
                    <p>
                        <a href="<?php echo $url; ?>menu.php?id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm" href="#" role="button">Lihat Detail</a>
                        <a href="<?php echo $url; ?>keranjang.php?act=beli&&produk_id=<?php echo $data['id'] ?>" class="btn btn-info btn-sm" href="#" role="button">Pesan</a>
                    </p>
                </div>  
                <?php } ?>
                </div>
            </div>
        </div>
        <!--/.Panel-->

        <!--Panel-->
        <div class="card card-body mb-3">
            <div class="media d-block d-md-flex">
                <div class="media-body pr-md-3 pr-0 text-center text-md-left">
                    <p>Soto mie, Soto mi, (atau disebut Mee soto di Malaysia dan Singapura)[1] adalah hidangan mi berkuah kaldu berbumbu yang lazim ditemukan di Indonesia lebih tepatnya di Sunda, Bogor, Jawa Barat</p>
                    <button type="button" class="btn btn-primary btn-md">Read more</button>
                </div>
                <img src="35.jpg" alt="Generic placeholder image">
            </div>z
        </div>
        <!--/.Panel-->

        <!--Panel-->
        <div class="card card-body">
            <div class="media d-block d-md-flex">
                <img src="36.jpg" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <p> Yang satu ini belum tentu semua orang suka, tapi banyak punya fans sendiri. Siapa lagi kalau bukan penggemar petai. Kalau kamu penggemar petai, pasti ini salah satu pendamping makanan ternikmat untuk kamu.</p>
                </div>
            </div>
        </div>
        <!--/.Panel-->

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-10 col-lg-9 col-xl-6">

        <!--Panel-->
        <div class="card card-body mb-3">
            <div class="media d-block d-md-flex">
                <img src="32.jpg" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <p>Tumis oncom adalah masakan khas Jawa Barat. Sayur tumis oncom seperti ini biasanya dimasak sebagai masakan sehari-hari.

Dengan dilengkapi leunca dan daun kemangi, sayur oncom jadi memiliki rasa yang tidak biasa, antara gurihnya oncom yang dibumbui, rasa pahitnya leunca dan wangi segarnya daun kemangi.</p>
                    <button type="button" class="btn btn-primary btn-md">Read more</button>
                </div>
            </div>
        </div>
        <!--/.Panel-->

        <!--Panel-->
        <div class="card card-body mb-3">
            <div class="media d-block d-md-flex">
                <div class="media-body pr-md-3 pr-0 text-center text-md-left">
                    <p>Wedang jahe adalah hidangan minuman sari jahe tradisional dari daerah Jawa Tengah dan Timur, Indonesia yang umumnya disajikan hangat atau panas.</p>
                    <button type="button" class="btn btn-primary btn-md">Read more</button>
                </div>
                <img src="33.jpg" alt="Generic placeholder image">
            </div>z
        </div>
        <!--/.Panel-->

        <!--Panel-->
        <div class="card card-body">
            <div class="media d-block d-md-flex">
                <img src="37.png" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <p> Bajigur adalah minuman tradisional khas masyarakat Sunda dari daerah Jawa Barat, Indonesia. Bahan utamanya adalah gula aren dan santan. Untuk menambah kenikmatan dicampurkan pula sedikit jahe, garam, dan bubuk vanili.</p>
                </div>
            </div>
        </div>
        <!--/.Panel-->

    </div>
    <!-- Grid column -->

</div>
<!-- Grid row -->

    <!--Footer-->
<footer class="page-footer font-small mdb-color lighten-3 pt-4 mt-4">

    <!--Footer Links-->
    <div class="container text-center text-md-left">
        <div class="row my-4">

            <!--First column-->
            <div class="col-md-4 col-lg-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Footer Content</h5>
                <p>Here you can use rows and columns here to organize your footer content.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident
                    voluptate esse quasi, veritatis totam voluptas nostrum. </p>
            </div>
            <!--/.First column-->

            <hr class="clearfix w-100 d-md-none">

            <!--Second column-->
            <div class="col-md-2 col-lg-2 ml-auto">
                <h5 class="text-uppercase mb-4 font-weight-bold">About</h5>
                <ul class="list-unstyled">
                    <p>
                        <a href="#!">PROJECTS</a>
                    </p>
                    <p>
                        <a href="#!">ABOUT US</a>
                    </p>
                    <p>
                        <a href="#!">BLOG</a>
                    </p>
                    <p>
                        <a href="#!">AWARDS</a>
                    </p>
                </ul>
            </div>
            <!--/.Second column-->

            <hr class="clearfix w-100 d-md-none">

            <!--Third column-->
            <div class="col-md-4 col-lg-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Address</h5>
                <!--Info-->
                <p>
                    <i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                <p>
                    <i class="fa fa-envelope mr-3"></i> info@example.com</p>
                <p>
                    <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                <p>
                    <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!--/.Third column-->

            <hr class="clearfix w-100 d-md-none">

            <!--Fourth column-->
            <div class="col-md-2 col-lg-2 text-center">
                <h5 class="text-uppercase mb-4 font-weight-bold">Follow Us</h5>
                <!--Social buttons-->
                <div class="mt-2">

                    <!--Facebook-->
                    <a type="fb-ic" class="fa-lg white-text mr-md-4">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <!--Twitter-->
                    <a type="tw-ic" class="fa-lg white-text mr-md-4">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <!--Google +-->
                    <a type="gplus-ic" class="fa-lg white-text mr-md-4">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <!--Dribbble-->
                    <a type="ins-ic" class="fa-lg white-text mr-md-4">
                        <i class="fa fa-instagram"></i>
                    </a>


                </div>
            </div>
            <!--/.Fourth column-->

        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        © 2018 Copyright:
        <a href="#"> Azkiya Martadewi Nuraeni </a>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->


</main>
<!--Main Layout-->

<body>

</body>

</html>
