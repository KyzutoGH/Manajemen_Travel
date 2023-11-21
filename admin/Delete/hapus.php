<?php
$judul_browser = "Administrator - Aplikasi Travel Gatel";
include '../../bagian/koneksi.php';
$menu = "Perjalanan";
$submenu = "Armada";
$subzero = $_GET['subzero'];

include '../../bagian/saitel.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judul_browser; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/sweetalert2.min.css">

  <link rel="stylesheet" href="../../dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../dist/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <?php
  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] != "login") {
    } else if ($_SESSION['status'] == "login") {

      if ($subzero == "Armada") {
        include 'armada/delete.php';
      } else {
        include '';
      }
    }
  } else {
    include '../bagian/noakses.php';
  }
  include '../bagian/kaki.php';
  ?>