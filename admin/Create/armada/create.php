<?php
    include '../../../bagian/koneksi.php';    
    
    $id = random_int(0,10000);
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $status = $_POST['status'];
    
    mysqli_query($koneksi,"insert into armada values ('$id','$nama','$jenis','$status')");
    
    header("location: ../../index.php?submenu=Armada");
?>