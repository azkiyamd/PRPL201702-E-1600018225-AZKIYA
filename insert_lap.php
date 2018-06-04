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

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$bayar = $_POST['bayar'];
$nama = $_POST['nama'];
$totalbayar = $_POST['totalbayar'];
$kembalian = $_POST['kembalian'];
$update = $konek->query("UPDATE `pesan` SET `ket`='OK' WHERE nomormeja = $nomormeja");
$add = $konek->query("INSERT INTO `laporan`(`nama`, `totalbayar`, `bayar`, `kembalian`, `tanggal`) VALUES ('$nama',$totalbayar,$bayar,$kembalian,'$tanggal')");

if($add){
	echo "SUKSES";
	header("location:nota.php?nama=$nama");
}else{
	echo "$nomormeja $totalbayar $bayar $kembalian $tanggal";
}
?>
