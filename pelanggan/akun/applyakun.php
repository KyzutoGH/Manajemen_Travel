<?php

    include '../../bagian/koneksi.php';    
    
    $idpelanggan = $_POST['idpelanggan'];
    $password = $_POST['password'];
    $namapelanggan = $_POST['namapelanggan'];
    $nomorhp = $_POST['nomorhp'];
    $nomoridentitas = $_POST['nomoridentitas'];
    
    mysqli_query($koneksi,"update pelanggan set Password='$password', NamaPelanggan='$namapelanggan', NomorHP='$nomorhp', NomorIdentitas='$nomoridentitas' where IDPelanggan='$idpelanggan'");
    
    header("location: index.php?submenu=Akun&IDPelanggan=$idpelanggan");
?>