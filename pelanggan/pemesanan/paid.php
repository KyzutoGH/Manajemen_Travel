<?php
include("../../bagian/koneksi.php");

// Periksa apakah IDTransaksi dikirim melalui POST
if (isset($_POST["IDTransaksi"])) {
    $idtrxf = $_POST["IDTransaksi"];
    $bank = $_POST["rekening"];

    // Gunakan prepared statement untuk menghindari SQL Injection
    $query = "UPDATE transaksi SET StatusTransaksi='Belum Kirim Bukti', BankTujuan=? WHERE IDTransaksi=?";
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter BankTujuan dan IDTransaksi
    mysqli_stmt_bind_param($stmt, "ss", $bank, $idtrxf);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Sukses
        echo "Status transaksi berhasil diubah.";
        header("Location: ../index.php?submenu=Transaksi");
        exit(); // Penting untuk mencegah eksekusi kode setelah redirect
    } else {
        // Gagal
        echo "Error: " . mysqli_error($koneksi);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    // IDTransaksi tidak ditemukan dalam POST
    echo "IDTransaksi tidak valid.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
