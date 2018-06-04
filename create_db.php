<?php
// membuat koneksi
$host = "localhost";
$username = "root";
$password = "";

$konek = new mysqli($host, $username, $password);

// mengecek koneksi
if($konek->connect_error){
	die("Koneksi Gagal Karena : ". $konek->connect_error);
}

// membuat perintah sql create database
$sql = "CREATE DATABASE azkiya_restoran";
if($konek->query($sql)){
	echo "Database BERHASIL dibuat";
}
else{
	echo "Database GAGAL dibuat karena : ".$konek->error;
}
// memutus koneksi
$konek->close();
?>
