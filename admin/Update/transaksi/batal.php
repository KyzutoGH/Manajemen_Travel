<?php
include '../../../bagian/koneksi.php';

$id = $_GET['idtrx'];
$status = $_GET['status'];

// Retrieve the old image filename
$query = mysqli_query($koneksi, "SELECT BuktiTransaksi FROM transaksi WHERE IDTransaksi='$id'");
$row = mysqli_fetch_assoc($query);
$oldImage = $row['BuktiTransaksi'] ?? null;

// If there is an old image, delete it
if ($oldImage) {
    $dirUpload = $_SERVER['DOCUMENT_ROOT'] . "/TravelKaleng/dist/img/trxs/"; // Update this path
    unlink($dirUpload . $oldImage);
}

// Perform the update query
mysqli_query($koneksi, "UPDATE transaksi SET BuktiTransaksi=' ', StatusTransaksi='Belum Kirim Bukti' WHERE IDTransaksi='$id'");

// Validate the update operation
if (mysqli_affected_rows($koneksi) > 0) {
    // If at least one row is affected, redirect to the specified page
    header("location: ../../index.php?submenu=Transaksi");
    exit(); // Ensure that the script exits after setting the header
} else {
    // If no rows were affected, handle the case accordingly
    echo "Update failed. No rows were affected.";
    // You may also choose to redirect with an error parameter, or display an error message on the current page
}
?>
