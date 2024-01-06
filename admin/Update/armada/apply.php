<?php

    include '../../../bagian/koneksi.php';    
    
    $id = $_POST['idarmada'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $status = $_POST['status'];
    
    mysqli_query($koneksi,"update armada set NamaArmada='$nama', Jenis='$jenis', Status='$status' where IDArmada='$id'");
    
    header("location: ../../index.php?submenu=Armada");
?>