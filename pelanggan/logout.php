<?php
session_start();

session_destroy();

header("location:../pelanggan/login.php");
?>