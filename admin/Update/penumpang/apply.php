<?php
include '../../../bagian/koneksi.php';

$id = $_POST['idpenumpang'];
$nama = $_POST['nama'];
$nomoridentitas = $_POST['nomoridentitas'];

mysqli_query($koneksi, "UPDATE penumpang SET NamaPenumpang='$nama', NomorIdentitas='$nomoridentitas' WHERE IDPenumpang='$id'");


header("location: ../../index.php?submenu=Penumpang");
?>
