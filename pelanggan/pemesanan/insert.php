<?php
// insert.php

include("../../bagian/koneksi.php");

// Your existing PHP code...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the main form
    $idjadwal = $_POST["idjadwal"];
    $hargabaru = 0; // Initialize the variable

    // Perform a query to get the 'harga' and 'diskon' based on 'idjadwal'
    $sql = "SELECT harga, diskon FROM Jadwal WHERE idjadwal = '$idjadwal'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        // Check if any row is returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the data
            $row = mysqli_fetch_assoc($result);
            $harga = $row['harga'];
            $diskon = $row['diskon'];

            // Apply discount logic
            if ($diskon > 0) {
                // If there is a discount, subtract it from the price
                $hargabaru = $harga - ($harga * $diskon / 100);
            } else {
                // If there is no discount, use the original price
                $hargabaru = $harga;
            }

            // Use the $harga variable as needed
            echo "Harga: $hargabaru";
        } else {
            echo "No data found for idjadwal: $idjadwal";
        }
    } else {
        // Handle the query error
        echo "Error: " . mysqli_error($koneksi);
    }

    $namapenumpang = $_POST["namapelanggan"];
    $jumlah_penumpang = $_POST["jumlah_penumpang"];
    $totalHargabayar = $hargabaru * $jumlah_penumpang;
    $idtrax = rand(0, 10000);

    // Additional data you may need
    $idPelanggan = isset($_POST["idpelanggan"]) ? $_POST["idpelanggan"] : null; // Ensure it's set

    // Insert data into the Transaksi table
    $sqlInsertTransaksi = "INSERT INTO Transaksi (IDTransaksi, IDPelanggan, IDJadwal, TanggalTransaksi, TotalHarga, StatusTransaksi, BuktiTransaksi) VALUES ('$idtrax','$idPelanggan', '$idjadwal', NOW(), '$totalHargabayar', 'Belum Dibayar', '')";

    if ($koneksi && mysqli_query($koneksi, $sqlInsertTransaksi)) {
        $idTransaksi = mysqli_insert_id($koneksi); // Get the last inserted ID

        // Insert data into the DetailTransaksi table for each selected passenger
        for ($i = 1; $i <= $jumlah_penumpang; $i++) {
            $idpenumpang_field = "idpenumpang_" . $i;
            $idPenumpang = is_array($_POST[$idpenumpang_field]) ? implode(',', $_POST[$idpenumpang_field]) : $_POST[$idpenumpang_field];
            $detailtrx = rand(0, 40000);

            $sqlInsertDetailTransaksi = "INSERT INTO DetailTransaksi (IDDetailTransaksi, IDTransaksi, IDPenumpang, HargaTiket) VALUES ('$detailtrx', '$idtrax', '$idPenumpang', '$hargabaru')";

            mysqli_query($koneksi, $sqlInsertDetailTransaksi);
        }

        header("Location: ../index.php?submenu=Bayar&IDTransaksi=$idtrax");
        exit();
    } else {
        // Handle the case where the Transaksi insertion fails
        echo "Error: " . mysqli_error($koneksi);
    }
}
