<?php 
    include '../../../bagian/koneksi.php';  
    $id = $_POST['idarmada'];
    $submenu = $_POST['subzero'];
    mysqli_query($koneksi,"DELETE FROM armada WHERE IDArmada='$id'");

    header("location: ../../index.php?submenu=".$submenu);
?>