<?php

    include '../../../bagian/koneksi.php';    
    
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $nomorhp = $_POST['nomorhp'];
    $nomoridentitas = $_POST['nomoridentitas'];
    
    mysqli_query($koneksi,"update pelanggan set Username='$username', Password='$password', NamaPelanggan='$nama', NomorHP='$nomorhp', NomorIdentitas='$nomoridentitas' where IDPelanggan='$id'");
    
    header("location: ../../index.php?submenu=Pelanggan");
?>