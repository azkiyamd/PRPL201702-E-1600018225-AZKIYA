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
$konek = new mysqli("localhost","root","","azkiya_restoran");

// mengecek koneksi
if($konek->connect_error){
  die("Koneksi Gagal Karena : ". $konek->connect_error);
}


$id_user = $_GET['id_user'];

$customer = mysqli_query($konek, " SELECT * FROM customer where id_user='$id_user'");
$row = mysqli_fetch_array($customer);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Basis Data Azkiya</title>
  </head>
  <body>
    <h1>Edit Data Customer</h1>
    <form action="update_customer.php" method="post">
      <td><input type="hidden" name="id_user" value="<?php echo $row['id_user'];?>"/></td>

      <table>
        <tr>
          <td>ID Customer</td>
          <td>:</td>

          <td><input type="text" disabled  value="<?php echo $row['id_user'];?>"/></td>
        </tr>
        <tr>
          <td>Nama makanan</td>
          <td>:</td>
          <td><textarea name="namamakanan" value="" rows="8" cols="40"><?php echo $row['namamakanan'];?></textarea></td>
        </tr>
        <tr>
          <td>Nama minuman</td>
          <td>:</td>
          <td><textarea name="namaminuman" value="" rows="8" cols="40"><?php echo $row['namaminuman'];?></textarea></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td><input type="submit" value="Submit"></td>
        </tr>

      </table>
    </form>
  </body>
</html>

</header>
