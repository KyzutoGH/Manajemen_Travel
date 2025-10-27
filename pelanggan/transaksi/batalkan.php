<?php
include("../../bagian/koneksi.php");

// Assuming $id contains the ID for the update
$id = mysqli_real_escape_string($koneksi, $_POST['IDTransaksi']); // Sanitize the input if needed

// Get the old image filename
$query = mysqli_query($koneksi, "SELECT BuktiTransaksi FROM transaksi WHERE IDTransaksi='$id'");
$row = mysqli_fetch_assoc($query);
$oldImage = $row['BuktiTransaksi'] ?? null;

// If there is an old image, delete it
if ($oldImage) {
    $dirUpload = $_SERVER['DOCUMENT_ROOT'] . "/TravelKaleng/dist/img/trxs/";
    unlink($dirUpload . $oldImage);
}

// Perform the update query
$query = mysqli_query($koneksi, "UPDATE transaksi SET StatusTransaksi='Dibatalkan', BuktiTransaksi='' WHERE IDTransaksi='$id'");

// Validate the update operation
if ($query) {
    // Check the number of affected rows
    $affectedRows = mysqli_affected_rows($koneksi);

    if ($affectedRows > 0) {
        header("Location: ../index.php?submenu=Transaksi");
    } elseif ($affectedRows === 0) {
        echo "Update successful but no rows were affected. The values may already be the same.";
    } else {
        echo "Update failed. No rows were affected.";
    }
} else {
    // Handle the case where the query itself failed
    echo "Update query failed: " . mysqli_error($koneksi);
}
?>
