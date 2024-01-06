<?php

include("../bagian/koneksi.php");

$idpelanggan = $_POST['idpelanggan'];
$idpenumpang = $_POST['idpenumpang'];

$query = "DELETE FROM penumpang WHERE IDPenumpang=$idpenumpang";

mysqli_query($koneksi, $query);

header("Location: index.php?submenu=EPenumpang&IDPelanggan=$idpelanggan");
?>
