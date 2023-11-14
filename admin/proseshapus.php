<?php 
  # code...
    $id = $_GET['id_buku'];
    mysqli_query($koneksi,"DELETE FROM data_buku WHERE id_buku='$id'");

    header("location:index.php");
?>