<?php
include '../../../bagian/koneksi.php';

$id = $_POST['idjadwal'];
$diskon = $_POST['diskon'];

mysqli_query($koneksi, "UPDATE jadwal SET Diskon='$diskon' WHERE IDJadwal='$id'");


header("location: ../../index.php?submenu=Jadwal");
?>
