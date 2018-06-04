<?php
include "koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
if (empty($nama)){
echo "<script>alert('Nama belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else
if (empty($alamat)){
echo "<script>alert('Alamat belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else 
if(empty($username)){
echo "<script>alert('Username belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}else{
$register = mysql_query("INSERT INTO user (nama,alamat,username) values ('$nama','$alamat','$username')");
if ($register){
echo "<script>alert('Berhasil Mendaftar')</script>";
echo "<meta http-equiv='refresh' content='1 url=menu.php'>";
}else{
echo "<script>alert('Gagal Mendaftar')</script>";
echo "<meta http-equiv='refresh' content='1 url=register.php'>";
}
}
?>