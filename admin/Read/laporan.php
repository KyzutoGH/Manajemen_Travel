<?php
// Mengecek apakah ada parameter tanggal yang dikirim
if (isset($_GET['tanggal'])) {
    $tanggal = $_GET['tanggal'];
} else {
    // Jika tidak ada tanggal yang dikirim, gunakan tanggal hari ini
    $tanggal = date('Y-m-d');
}

// Query untuk mengambil data transaksi pada tanggal tertentu
$query = "SELECT j.IDJadwal,
            a.NamaArmada,
            j.Asal,
            j.Tujuan,
            t.IDTransaksi AS 'ID Transaksi',
            p.NamaPelanggan AS 'Nama Pelanggan',
            CONCAT(a.NamaArmada,' : ', j.Asal,' - ', j.Tujuan) AS 'Perjalanan',
            t.TanggalTransaksi AS 'Tanggal Transaksi',
            t.TotalHarga AS 'Harga',
            j.Diskon AS 'Diskon',
            t.StatusTransaksi AS 'Status',
            COUNT(tp.IDPenumpang) AS 'Jumlah Penumpang'
        FROM 
            transaksi t
        JOIN 
            pelanggan p ON t.IDPelanggan = p.IDPelanggan
        JOIN 
            jadwal j ON t.IDJadwal = j.IDJadwal
        JOIN 
            armada a ON j.IDArmada = a.IDArmada
        LEFT JOIN
            detailtransaksi tp ON t.IDTransaksi = tp.IDTransaksi
        WHERE
            DATE(t.TanggalTransaksi) = '$tanggal'
        GROUP BY 
            t.IDTransaksi, p.NamaPelanggan, j.Diskon, t.StatusTransaksi";

// Jalankan query
$data = mysqli_query($koneksi, $query);
?>
<div id="content">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Laporan Transaksi</h1>
            <p>Tanggal Transaksi: <?php echo $tanggal; ?></p>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <!-- Hide the print button when printing -->
                            <button class="btn btn-primary btn-flat fa fa-print print-button" onclick="window.print()" title="Cetak Laporan Hari Ini"></button>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelanggan</th>
                                        <th>Perjalanan</th>
                                        <th>Tanggal</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['Nama Pelanggan']; ?></td>
                                            <td><?php echo $d['Perjalanan']; ?></td>
                                            <td>
                                                <?php
                                                $tanggalBerangkat = $d['Tanggal Transaksi'];
                                                $timestamp = strtotime($tanggalBerangkat);

                                                $bulan = array(
                                                    1 => "JAN", 2 => "FEB", 3 => "MAR", 4 => "APR", 5 => "MEI", 6 => "JUN",
                                                    7 => "JUL", 8 => "AGU", 9 => "SEP", 10 => "OKT", 11 => "NOV", 12 => "DES"
                                                );

                                                $tanggalFormatted = date('d', $timestamp) . ' ' . $bulan[date('n', $timestamp)] . ' ' . date('Y', $timestamp);

                                                echo $tanggalFormatted;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $harga = $d['Harga'];
                                                $diskon = $d['Diskon'];
                                                $jumlahPenumpang = $d['Jumlah Penumpang'];

                                                $hargaSetelahDiskon = $harga - ($harga * ($diskon / 100));

                                                if ($jumlahPenumpang == 0) {
                                                    $totalHarga = $hargaSetelahDiskon * 1;
                                                } elseif ($jumlahPenumpang != 0) {
                                                    $totalHarga = $hargaSetelahDiskon * $jumlahPenumpang;
                                                }

                                                if ($diskon == 0) {
                                                    echo 'Rp ' . number_format($totalHarga, 0, ',', '.');
                                                } elseif ($diskon != 0) {
                                                    echo '<del>Rp ' . number_format($harga * $jumlahPenumpang, 0, ',', '.') . '</del>';
                                                    echo '<br>Rp ' . number_format($totalHarga, 0, ',', '.');
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <span class="<?php echo ($d['Status'] == 'Belum Dibayar') ? 'label label-danger' : (($d['Status'] == 'Dibayar') ? 'label label-warning' : (($d['Status'] == 'Dibatalkan') ? 'label label-success' : '')); ?>">
                                                    <?php echo $d['Status']; ?></span>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>