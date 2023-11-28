<?php
    include '../../../bagian/koneksi.php';    
    
    $id = random_int(0,10000);
    $idpelanggan = $_POST['idpelanggan'];
    $nama = $_POST['nama'];
    $nomoridentitas = $_POST['nomoridentitas'];
    
    mysqli_query($koneksi,"insert into penumpang values ('$id','$idpelanggan','$nama','$nomoridentitas')");
    
    header("location: ../../index.php?submenu=Penumpang");
?>