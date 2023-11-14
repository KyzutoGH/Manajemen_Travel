<?php
    include 'koneksi.php';    
    
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $jenis = $_POST['jenis'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    
    mysqli_query($koneksi,"update data_buku  set kode_buku='$kode', judul_buku='$judul', jenis='$jenis', pengarang='$pengarang', penerbit='$penerbit', tahun='$tahun'  where id_buku='$id'");
    
    header("location: index.php");
?>