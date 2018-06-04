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

// membuat table mata kuliah
$sql = "CREATE TABLE customer(
  idcustomer VARCHAR(10) NOT NULL,
  namacustomer VARCHAR(30) NOT NULL,
  alamatcustomer VARCHAR(30) NOT NULL,
  namamakanan VARCHAR(30) NOT NULL,
  namaminuman VARCHAR(30) NOT NULL,
  PRIMARY KEY (idcustomer)
)";

if($konek->query($sql)){
  echo "Table customer BERHASIL dibuat!<br/>";
}else{
  echo "Table customer GAGAL dibuat : ".$konek->error;
}

$konek->close();
?>
