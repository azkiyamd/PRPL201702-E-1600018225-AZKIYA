<html>
<head>
	<link href ="struk.css" rel = "stylesheet" type="text/css" media = "all" />
	<script type="text/javascript">
		
	</script>
</head>
<body>

	<div class="container">
		<h1> RESTORAN IT </h1>
		<h2> BILL PEMBAYARAN </h2>
		<h3> Jalan UmbulHarjo No 10 , Yogyakarta</h3>
		<h2> ==================== </h2>	

<?php
$tgl_skrg = date("d-m-Y");

$host = "localhost";
$username = "root";
$password = "";
$db_name = "azkiya_restoran";

$konek = new mysqli($host, $username, $password , $db_name);


if($konek->connect_error){
  die("Koneksi Gagal Karena : ". $konek->connect_error);
}else {

$id_user = $_GET['id_user'];

$pesan = "SELECT * FROM `menu`, `pesan` WHERE pesan.id_user = $id_user AND pesan.idmenu = menu.idmenu ";
$total = 0;
        foreach ($pesan as $p) {
        $total += $p['harga'];
echo "<table border='0'>";

if ($data->num_rows > 0){
	while ($row = $data->fetch_assoc()) {
		echo "<tr>";
		echo "<td>TANGGAL </td>";
		echo "<td> : </td>";
		echo "<td> $tgl_skrg </td>";
		echo "</tr>";
		echo "<td></td>";
		echo "<tr>";
		echo "<td> NAMA PEMESAN </td>";
		echo "<td> : </td>";
		echo "<td>".$row['nama']."</td>";
		echo "</tr>";
		echo "<td></td>";
		echo "<tr>";
		echo "<td> Nama menu </td>";
		echo "<td> : </td>";
		echo "<td>".$p['namamenu'];
		echo "</td>";
		echo "<td>".$p['namamenu']."</td>";
		echo "</tr>";
		

		echo "<td></td>";
		echo "<tr>";
		echo "<td><b> JUMLAH BARANG </td>";
		echo "<td><b> : </td>";
		echo "<td></td>";
		echo "<td><b>".$row['totalbarang'];
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><b> TOTAL HARGA </td>";
		echo "<td><b> : </td>";
		echo "<td></td>";
		echo "<td><b>".$row['bayar'];
		echo "</td>";
		echo "</tr>";
		echo "</table>";

	}	
}else{
	echo"Tidak dapat di cetak";
}
}
$konek->close();
?>
</div>
<h3><a href="#" onclick="window.print()"> Print </a> </h3>	
</body>
</html>