<?php 
    include '../../../bagian/koneksi.php';  
    $id = $_POST['idpelanggan'];
    $submenu = $_POST['subzero'];
    mysqli_query($koneksi,"DELETE FROM pelanggan WHERE IDPelanggan='$id'");
    mysqli_query($koneksi,"DELETE FROM penumpang WHERE IDPelanggan='$id'");

    header("location: ../../index.php?submenu=".$submenu);
?>