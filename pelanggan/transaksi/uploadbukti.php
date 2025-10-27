<?php
include("../../bagian/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
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

    // ID Transaksi
    $idtransaksi = $_POST['IDTransaksi'];

    // Menambahkan query SQL untuk mendapatkan gambar lama
    $query = mysqli_query($koneksi, "SELECT BuktiTransaksi FROM transaksi WHERE IDTransaksi='$idtransaksi'");
    $row = mysqli_fetch_assoc($query);
    $oldImage = $row['BuktiTransaksi'] ?? null;

    // Jika ada gambar lama, hapus gambar tersebut
    if ($oldImage) {
        unlink($dirUpload . $oldImage);
    }

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFileBaru);

    if ($terupload) {
        // update database dengan nama file baru
        $query = mysqli_query($koneksi, "UPDATE transaksi SET BuktiTransaksi='$namaFileBaru', StatusTransaksi='Sudah Kirim Bukti' WHERE IDTransaksi='$idtransaksi'");

        if ($query) {
            // echo "Berhasil";
            header("location: ../index.php?submenu=Transaksi");
        } else {
            echo "Gagal memperbarui database!";
        }
    } else {
        echo "Upload Gagal!";
    }
}
?>
