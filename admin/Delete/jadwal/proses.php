<?php 
    include '../../../bagian/koneksi.php';  
    $id = $_POST['idjadwal'];
    $submenu = $_POST['subzero'];
    mysqli_query($koneksi,"DELETE FROM jadwal WHERE IDJadwal='$id'");

    header("location: ../../index.php?submenu=".$submenu);
?>