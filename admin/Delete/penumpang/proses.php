<?php 
    include '../../../bagian/koneksi.php';  
    $id = $_POST['idpenumpang'];
    $submenu = $_POST['subzero'];
    mysqli_query($koneksi,"DELETE FROM penumpang WHERE IDPenumpang='$id'");

    header("location: ../../index.php?submenu=".$submenu);
?>