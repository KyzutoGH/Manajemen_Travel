<?php
  include 'koneksi.php';
  $aidi = uniqid();
  $user = trim($_POST['user']);
  $pass  = trim($_POST['pass']);
  $nama  = trim($_POST['nama']);
  $hp  = trim($_POST['hp']);
  $nik  = trim($_POST['nik']);

  mysqli_query($koneksi, "insert into pelanggan values('$aidi','$user','$pass','$nama','$hp','$nik')"); 
  header("location:login.php");
?>