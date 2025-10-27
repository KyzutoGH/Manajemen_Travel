<?php
    include '../../../bagian/koneksi.php';    
    
    $idplg = $_POST['idpelanggan'];
    $idpnp = random_int(0, 10000);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $nomorhp = $_POST['nomorhp'];
    $nomoridentitas = $_POST['nomoridentitas'];
    
    // Gunakan prepared statements
    $queryPelanggan = "INSERT INTO pelanggan (IDPelanggan, username, password, namapelanggan, nomorhp, nomoridentitas) VALUES ('$idplg', '$username', '$password', '$nama', '$nomorhp', '$nomoridentitas')";
    mysqli_query($koneksi, $queryPelanggan);

    // Gunakan prepared statements dan tentukan kolom yang sesuai
    $queryPenumpang = "INSERT INTO penumpang (idpenumpang, idpelanggan, namapenumpang, nomoridentitas) VALUES ('$idpnp', '$idplg', '$nama', '$nomoridentitas')";
    mysqli_query($koneksi, $queryPenumpang);

    // Tangani error
    if (mysqli_error($koneksi)) {
        echo "Error: " . mysqli_error($koneksi);
    } else {
        header("location: ../../index.php?submenu=Pelanggan");
    }
?>
