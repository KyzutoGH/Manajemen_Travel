<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../bagian/koneksi.php';
 
// menangkap data yang dikirim dari form login
$user = $_POST['user'];
$pass = $_POST['pass'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pelanggan where Username='$user' and Password='$pass'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
  $data = mysqli_fetch_assoc($login);
 
    // buat session login dan username
    $_SESSION['user'] = $user;
    $_SESSION['status'] = "login";
    $_SESSION['role'] = "pelanggan";
    // alihkan ke halaman dashboard admin
    header("location:../pelanggan/index.php?submenu=Jadwal");
}else{
  echo "ERROR 2";
}
 