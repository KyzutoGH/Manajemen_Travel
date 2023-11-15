<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../bagian/koneksi.php';
 
// menangkap data yang dikirim dari form login
$user = $_POST['user'];
$pass = $_POST['pass'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pelanggan where username='$user' and password='$pass'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
  $data = mysqli_fetch_assoc($login);
 
    // buat session login dan username
    $_SESSION['user'] = $user;
    $_SESSION['status'] = "login";
    $akses = "Admin";
    // alihkan ke halaman dashboard admin
    header("location:../pelanggan/index.php");
}else{
  echo "ERROR 2";
}
 