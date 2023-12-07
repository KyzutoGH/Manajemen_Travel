<?php
include '../../bagian/koneksi.php';

$id = $_GET['IDTransaksi'];

mysqli_query($koneksi, "UPDATE transaksi SET StatusTransaksi='Dibatalkan' WHERE IDTransaksi='$id'");


header("location: ../../index.php?submenu=Transaksi");
?>
