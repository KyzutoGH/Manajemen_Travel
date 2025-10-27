<?php
include '../../../bagian/koneksi.php';

$id = $_GET['idtrx'] ?? null;
$status = $_GET['status'] ?? null;

if (!$id) {
    die("ID transaksi tidak ditemukan.");
}

// Ambil nama file bukti transaksi
$query = mysqli_query($koneksi, "SELECT BuktiTransaksi FROM transaksi WHERE IDTransaksi='$id'");
$row = mysqli_fetch_assoc($query);
$oldImage = $row['BuktiTransaksi'] ?? null;

// Jika ada bukti lama dan file-nya benar-benar ada, hapus
if ($oldImage) {
    $dirUpload = $_SERVER['DOCUMENT_ROOT'] . "/TravelKaleng/dist/img/trxs/";
    $filePath = $dirUpload . $oldImage;
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// Update status transaksi jadi Dibatalkan dan kosongkan bukti
$update = mysqli_query($koneksi, "
    UPDATE transaksi 
    SET BuktiTransaksi = '', 
        StatusTransaksi = 'Dibatalkan' 
    WHERE IDTransaksi = '$id'
");

// Validasi hasil update
if ($update && mysqli_affected_rows($koneksi) > 0) {
    header("Location: ../../index.php?submenu=Transaksi");
    exit();
} else {
    echo "Gagal membatalkan transaksi (mungkin ID salah atau data tidak berubah).";
}
?>
