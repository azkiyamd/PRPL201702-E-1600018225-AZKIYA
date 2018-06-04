<!DOCTYPE html>
<html lang="en" class="full-height">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">




</head>

  </head>
  <body>

  </body>
</html>

<header>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <a class="navbar-brand" href="#"><strong>MADE IN SUNDA</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
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



<?php
// membuat koneksi
$host = "localhost";
$username = "root";
$password = "";
$db_name = "azkiya_restoran";

$konek = new mysqli($host, $username, $password, $db_name);

// mengecek koneksi
if($konek->connect_error){
  die("Koneksi Gagal Karena : ". $konek->connect_error);
}

$nama=$_POST['nama'];
$no_meja=$_POST['no_meja'];
$makanan = $_POST['makanan'];
$jumlah_makanan = $_POST['jumlah_makanan'];
$tanggal = $_POST['tanggal'];


$j = 0;
for ($i=0; $i < count($jumlah_makanan); $i++) { 
    if ($jumlah_makanan[$i] != NULL) {
        $jumlah = $jumlah_makanan[$i];
        $idmenu = $makanan[$j];
        echo "$nama $no_meja $idmenu $jumlah $tanggal<br>";
        $harga = $konek->query("SELECT hargamenu FROM menu WHERE idmenu = '$idmenu'");
        foreach ($harga as $h) {
            $totalHarga = $h['hargamenu']*$jumlah;
            $query = $konek->query("INSERT INTO `pesan`(`nama`, `nomormeja`, `idmenu`, `jumlah`, `tanggal`) 
                VALUES ('$nama',$no_meja,'$idmenu',$jumlah,'$tanggal')");
        }
        $j++;
    }
}
if ($query) {
    header("location:tampil_customer.php");
}
?>