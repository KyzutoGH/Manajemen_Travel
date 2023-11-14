<?php
    include 'koneksi.php';    
    
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $jenis = $_POST['jenis'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    
    mysqli_query($koneksi,"insert into data_buku values ('','$kode','$judul','$jenis','$pengarang','$penerbit','$tahun')");
    
    header("location: index.php");
?>