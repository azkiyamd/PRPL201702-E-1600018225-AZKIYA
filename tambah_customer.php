
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


  <body>

  </body>
</html>





<!--Main Navigation-->
<header>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <a class="navbar-brand" href="#"><strong>MADE IN SUNDA</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
date_default_timezone_set('Asia/jakarta');

?>

    <ul>
        <li><a href="tampil_customer.php">Lihat Daftar Pesanan</a></li>
      </ul>
    <h1>Tambah Data Pesanan</h1>
    <form action="simpan_customer.php" method="post">
      <table>
        <tr>
          <div class="form-group">
              <label for="exampleInputEmail1"><strong>Nama :</strong></label>
              <input type="text" class="form-control" name="nama">
            </div>
        </tr>
        <tr>
          <div class="form-group">
              <label for="exampleInputEmail1"><strong>No meja :</strong></label>
              <input type="text" class="form-control" name="no_meja">
            </div>
        </tr>
        <tr>
          <div class="form-group">
              <label for="exampleInputPassword1"><strong>Makanan:</strong></label><br>
              <div class="row">
                <?php
                  $makanan = $konek->query("SELECT * FROM menu WHERE kategori = 'makanan'");
                  foreach ($makanan as $x) {
                ?>
                <div class="col-sm-3">
                    <label class="checkbox-inline"><input type="checkbox" value="<?php echo $x['idmenu']; ?>" name="makanan[]"><?php echo $x['namamenu']; ?></label>
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="jumlah_makanan[]" placeholder="Jumlah"></div>
                <br>
                <?php }?>
              </div>
            </div>
        </tr>
        <tr>
          <div class="form-group">
              <label for="exampleInputPassword1"><strong>Minuman:</strong></label><br>
              <div class="row">
                <?php
                  $minuman = $konek->query("SELECT * FROM menu WHERE kategori = 'minuman'");
                  foreach ($minuman as $x) {
                ?>
                <div class="col-sm-3">
                    <label class="checkbox-inline"><input type="checkbox" value="<?php echo $x['idmenu']; ?>" name="makanan[]"><?php echo $x['namamenu']; ?></label>
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="jumlah_makanan[]" placeholder="Jumlah"></div>
                <br>
                <?php }?>
              </div>
            </div>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
          <td><input type="hidden" value="<?php echo date('Y-m-d')?>" name="tanggal">
            <input type="text" value="<?php echo date('Y-m-d')?>" disabled></td>
        </tr>
        
          <td colspan="2"></td>
          <td><input type="submit" value="Submit" class="btn btn-success"></td>
        
      </table>
    </form>
                </div>
            </div>
        </div>
    </div>

</header>
<!--Main Navigation-->


