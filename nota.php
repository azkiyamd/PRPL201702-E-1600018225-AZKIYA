<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Menu</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">




</head>


  <body id="page-top">

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark rgba-purple-light">
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
        $i = 1;
        $nama = $_GET['nama'];
        $data = $konek->query("SELECT * FROM laporan WHERE nama = '$nama'");
        foreach ($data as $x) {
        }
     ?>

     <br><br><br><br>
          <div class="container">
            <h2 class="text-center text-uppercase" style="color : #aa4040; ">NOTA PEMBAYARAN</h2>
            <br>
            <div class="row">
              <div class="col-md-5">
                <table class="table borderless">
                  <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <th><?php echo $x['nama']; ?></th>
                  </tr>
                  <tr>
                    <th>Tanggal Transaksi</th>
                    <th>:</th>
                    <th><?php echo $x['tanggal']; ?></th>
                  </tr>
              </table>
              </div>
              <div class="col-lg-12">
                      <table class="table table-hover">
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                      <?php
                        $pesan = $konek->query("SELECT * FROM `menu`, `pesan` WHERE nama = '$nama' AND pesan.idmenu = menu.idmenu");
                        $total = 0;
                        foreach ($pesan as $p) {
                          $sumH = $p['hargamenu']*$p['jumlah'];
                          $total += $sumH
                          ?>
                          <tr>
                            <td><?php echo $p['namamenu'];?></td>
                            <td><?php echo $p['jumlah'];?></td>
                            <td><?php echo $p['hargamenu'];?></td>
                            <td><?php echo $sumH;?></td>
                          </tr>
                        <?php }?>
                        <tr>
                          <td colspan="3"><b>TOTAL</b></td>
                          <td><b>Rp <?php echo number_format($total,0,",","."); ?>,-</b></td>
                        </tr>
                        <tr>
                          <td colspan="3"><b>BAYAR</b></td>
                          <td><b>Rp <?php echo number_format($x['bayar'],0,",","."); ?>,-</b></td>
                        </tr>
                        <tr>
                          <td colspan="3"><b>KEMBALIAN</b></td>
                          <td><b>Rp <?php echo number_format($x['kembalian'],0,",","."); ?>,-</b></td>
                        </tr>
                        </table>
                        </div>
            </div>
          </div>
        </section>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

<h2 class="text-center text-uppercase" style="color : #aa4040; "><a href="#" onclick="window.print()">PRINT</a></h2>

    <!-- Portfolio Modals -->

    
    <!-- Bootstrap core JavaScript -->
 

  </body>

</html>