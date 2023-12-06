<?php
include("../../bagian/koneksi.php");

// ambil data file
$namaFile = $_FILES['file']['name'];
$namaSementara = $_FILES['file']['tmp_name'];

// Menghasilkan nomor acak untuk nama file
$randomNumber = rand();

// Mendapatkan ekstensi file
$fileType = pathinfo($namaFile, PATHINFO_EXTENSION);

// Membuat nama file baru dengan nomor acak
$namaFileBaru = $randomNumber . '.' . $fileType;

// tentukan lokasi file akan dipindahkan
$dirUpload = $_SERVER['DOCUMENT_ROOT'] . "/TravelKaleng/dist/img/trxs/";

// Menambahkan query SQL untuk mendapatkan gambar lama
$idtransaksi = "Your transaction ID"; // Ganti dengan ID transaksi Anda
$query = mysqli_query($koneksi, "SELECT BuktiTransaksi FROM transaksi WHERE IDTransaksi='$idtransaksi'");
$row = mysqli_fetch_assoc($query);
$oldImage = $row['BuktiTransaksi'];

// Jika ada gambar lama, hapus gambar tersebut
if ($oldImage) {
    unlink($dirUpload . $oldImage);
}

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFileBaru);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$namaFileBaru."'>".$namaFileBaru."</a>";

    // Menambahkan query SQL untuk memperbarui database
    $query = mysqli_query($koneksi, "UPDATE transaksi SET BuktiTransaksi='$namaFileBaru' WHERE IDTransaksi='$idtransaksi'");

    if ($query) {
        echo "Database berhasil diperbarui!";
    } else {
        echo "Gagal memperbarui database!";
    }

} else {
    echo "Upload Gagal!";
}
?>
