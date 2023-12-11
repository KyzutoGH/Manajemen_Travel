<?php

include("../bagian/koneksi.php");

$idpelanggan = $_POST['idpelanggan'];
$idpenumpang = $_POST['idpenumpang'];

$namaPenumpang = htmlspecialchars($_POST['namapenumpang']);
$nomorId = htmlspecialchars($_POST['nomoridentitas']);

$query = "UPDATE penumpang SET NamaPenumpang='$namaPenumpang', NomorIdentitas='$nomorId' WHERE IDPenumpang='$idpenumpang'";

mysqli_query($koneksi, $query);

header("Location: index.php?submenu=EPenumpang&IDPelanggan=$idpelanggan");
?>
