<?php
    $koneksi = mysqli_connect("localhost","root","","tiketrahayu");
    $db = new mysqli("localhost", "root", "", "tiketrahayu");
    if(mysqli_connect_errno()){
        echo"Koneksi Database Gagal : ".
        mysqli_connect_error();
    }
?>