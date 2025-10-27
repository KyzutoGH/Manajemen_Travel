<?php
include '../bagian/koneksi.php';
$aidi = trim($_POST['idpelanggan']);
$idpnp = rand(100000, 999999); // ID acak 6 digit (misal 345672)
$user = trim($_POST['user']);
$pass  = trim($_POST['pass']);
$nama  = trim($_POST['nama']);
$hp  = trim($_POST['hp']);
$nik  = trim($_POST['nik']);

mysqli_query($koneksi, "insert into pelanggan values('$aidi','$user','$pass','$nama','$hp','$nik')");
// Gunakan prepared statements dan tentukan kolom yang sesuai
$queryPenumpang = "INSERT INTO penumpang (idpenumpang, idpelanggan, namapenumpang, nomoridentitas) VALUES ('$idpnp', '$aidi', '$nama', '$nik')";
mysqli_query($koneksi, $queryPenumpang);

header("location:login.php");
