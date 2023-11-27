<?php
include '../../../bagian/koneksi.php';

$id = $_GET['idtrx'];
$status = $_GET['status'];

mysqli_query($koneksi, "UPDATE transaksi SET StatusTransaksi='Dibayar' WHERE IDTransaksi='$id'");


header("location: ../../index.php?submenu=Transaksi");
?>
