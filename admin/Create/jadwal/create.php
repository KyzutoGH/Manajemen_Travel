<?php
include '../../../bagian/koneksi.php';

$id = random_int(0, 10000);
$armada = $_POST['armada'];
$asal = $_POST['asal'];
$tujuan = $_POST['tujuan'];
$kelas = $_POST['kelas'];
$tanggalberangkat = $_POST['tanggalberangkat'];
$tanggaltiba = $_POST['tanggaltiba'];
$berangkat = $_POST['berangkat'];
$tiba = $_POST['tiba'];
$harga = $_POST['harga'];
$diskon = $_POST['diskon'];

mysqli_query($koneksi, "INSERT INTO jadwal VALUES ('$id','$armada','$asal','$tujuan','$kelas','$tanggalberangkat','$tanggaltiba','$berangkat','$tiba','$harga','$diskon')");

header("location: ../../index.php?submenu=Jadwal");
