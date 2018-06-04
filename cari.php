<!DOCTYPE html>
<html lang="en" class="full-height">


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

  </head>
  <body>
    
  </body>
</html>

<header>

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
<br><br><br>
        

<ul>
        <li><a href="tambah_customer.php">Order lagi</a></li>
      </ul>

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
$text = $_GET['cari'];
$data = $konek->query("SELECT * FROM `laporan`, `menu`, `pesan` WHERE 
  menu.idmenu = pesan.idmenu AND 
  laporan.nama LIKE '%$text%' AND 
  pesan.nama = laporan.nama 
  group by pesan.nama");


?>

<!-- Material auto-sizing form -->
<form action="cari.php" method="get">
    <!-- Grid row -->
    <div class="form-row align-items-center card w-25 w-responsive mx-auto p-3">
        <!-- Grid column -->
        <div class="col-auto">
            <!-- Material input -->
            <div class="md-form">
              <form action="cari.php" method="get">
                <input type="text" name="cari" class="form-control mb-2" id="inlineFormInputMD" placeholder="Cari">
                <label class="sr-only" for="inlineFormInputMD">Cari</label>
            </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-0">Submit</button>
        </div>
        <!-- Grid column -->
    </div>
    <!-- Grid row -->
</form>
<!-- Material auto-sizing form -->


<div class="container">
<table class="table table-stripped">
    <thead class="thead dark">
      <tr>
        <th>No.</th>
        <th>Nama Pemesan</th>
        <th>Menu yang Dipesan</th>
        <th>Tanggal Transaksi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
          foreach ($data as $d) {
          $nama = $d['nama'];
          if ($d['ket'] == 'OK') {
            $disabled = 'disabled';
            $sudah = 'Sudah di bayar';
            $type = 'hidden';
          }else{
            $disabled = '';
            $sudah = '';
            $type = 'text';
          }
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $d['nama']; ?></td>
        <td>
          <table class="table-active">
            <th>Nama Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
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
              <td colspan="2"><b>TOTAL</b></td>
              <td><b>Rp <?php echo number_format($total,0,",",","); ?>,-</b></td>
            </tr>
            </table>
        </td>
        <td><?php echo $d['tanggal']; ?></td>

<script type="text/javascript">
  function kembalian<?php echo $i; ?>() {
    var totalHarga = <?php echo $total; ?>;
    var bayar = document.getElementById('bayar<?php echo $i;?>').value;
    if(bayar >= totalHarga){
      var hasil = bayar - totalHarga;
      var reverse = hasil.toString().split('').reverse().join(''),
          ribuan = reverse.match(/\d{1,3}/g);
      ribuan = ribuan.join('.').split('').reverse().join('');
      var kembalian = document.getElementById('kembalian<?php echo $i;?>').innerHTML="KEMBALIAN Rp "+ribuan+",-";
      var byr = document.getElementById('byr<?php echo $i;?>').value=bayar;
      var balik = document.getElementById('balik<?php echo $i;?>').value=hasil;
    }else{
      var kembalian = document.getElementById('kembalian<?php echo $i;?>').innerHTML="Maaf, uang anda kurang";
    }
  }
</script>

    <td>
      <b><?php echo $sudah; ?></b>
      <input type="<?php echo $type; ?>" id="bayar<?php echo $i;?>" class="form-input" <?php echo $disabled; ?>>


        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary <?php echo $disabled; ?>" onclick="kembalian<?php echo $i;?>()" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">
    Bayar
</button>

  <form action="insert_lap.php" method="post">
            
                <h5 id="kembalian<?php echo $i;?>"></h5>
          <input type="hidden" name="totalbayar" value="<?php echo $total; ?>">
          <input type="hidden" name="nama" value="<?php echo $nama; ?>">
          <input type="hidden" name="bayar" id="byr<?php echo $i; ?>">
          <input type="hidden" name="nomormeja" value="<?php echo $d['nomormeja']; ?>">
          <input type="hidden" name="kembalian" id="balik<?php echo $i; ?>">
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="Submit" class="btn btn-success">Save changes</button>
          
        
      </form>
    </div>
</div>
                                

                    

    </td>
      </tr>
      <?php $i++;} ?>
    </tbody>
  </table>
</div>
</center>
  </div>
  </body>
  <?php $konek->close(); ?>
</html>
<!--Main Navigation-->