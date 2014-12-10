<?php
//1. buat koneksi
$host = "localhost";
$user = "root";
$pass = "";
$name = "cms";

$koneksi = mysqli_connect($host, $user, $pass, $name);

if(mysqli_connect_errno()){
	die("error:" . mysqli_connect_error());
}
?>