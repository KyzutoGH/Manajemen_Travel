<?php

include("../bagian/koneksi.php");

$id = random_int(0,10000);
$idpelanggan = $_POST['idpelanggan'];
$nama = $_POST['namapenumpang'];
$nomoridentitas = $_POST['nomoridentitas'];

mysqli_query($koneksi,"insert into penumpang values ('$id','$idpelanggan','$nama','$nomoridentitas')");

header("Location: index.php?submenu=EPenumpang&IDPelanggan=$idpelanggan");
?>
