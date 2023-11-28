<?php
    include '../../../bagian/koneksi.php';    
    
    $id = random_int(0,10000);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $nomorhp = $_POST['nomorhp'];
    $nomoridentitas = $_POST['nomoridentitas'];
    
    mysqli_query($koneksi,"insert into pelanggan values ('$id','$username','$password','$nama','$nomorhp','$nomoridentitas')");
    
    header("location: ../../index.php?submenu=Pelanggan");
?>