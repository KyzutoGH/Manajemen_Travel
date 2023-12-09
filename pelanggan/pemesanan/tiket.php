<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Mode</h1>
        <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Tambah <?php if ($submenu == "Transaksi") echo 'Transaksi'; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
        <button onclick="window.print()">Cetak Tiket</button>
            <?php
            $idtrxk = $_GET['IDTransaksi'];
            $data = mysqli_query($koneksi, "SELECT j.IDJadwal,
                t.IDTransaksi,
                j.Kelas,
                a.NamaArmada,
                j.Asal,
                j.Tujuan,
                t.BuktiTransaksi,
                j.TanggalBerangkat,
                t.IDTransaksi AS 'ID Transaksi',
                p.NamaPelanggan AS 'Nama Pelanggan',
                CONCAT(SUBSTRING(a.NamaArmada, 1, 3), SUBSTRING(j.Asal, 1, 3), SUBSTRING(j.Tujuan, 1, 3)) AS 'Perjalanan',
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
            WHERE t.IDTransaksi = $idtrxk;");

            // Check if there are rows in the result set
            if (mysqli_num_rows($data) > 0) {
                // Loop through each row in the result set
                while ($row = mysqli_fetch_assoc($data)) {
                    if ($row['Jumlah Penumpang'] >= 1) {
                        $passengerData = mysqli_query($koneksi, "SELECT * FROM detailtransaksi 
                        JOIN penumpang ON detailtransaksi.IDPenumpang = penumpang.IDPenumpang
                        WHERE detailtransaksi.IDTransaksi = $idtrxk;");

                        if (mysqli_num_rows($passengerData) > 0) {
                            // Loop through each passenger and display ticket information
                            while ($passengerRow = mysqli_fetch_assoc($passengerData)) {
            ?>
                                <div class="callout callout-warning">
                                    <table border="1" style="width: 100%; font-family: Arial, Helvetica, sans-serif; text-align: center;">
                                        <tr>
                                            <th>NAMA/NAME</th>
                                            <th>KELAS/CLASS</th>
                                            <th>TANGGAL BERANGKAT</th>
                                            <th rowspan="4">LOGO ARMADA</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $passengerRow['NamaPenumpang']; ?></td>
                                            <td><?php echo $row['Kelas']; ?></td>
                                            <td><?php echo $row['TanggalBerangkat']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>ARMADA</th>
                                            <th>ASAL/TUJUAN</th>
                                            <th rowspan="2">E-SIGNATURE AGEN</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $row['NamaArmada']; ?></td>
                                            <td><?php echo $row['Asal'] . ' - ' . $row['Tujuan']; ?></td>
                                        </tr>
                                    </table>
                                    <p>E-TIKET INI DISIMPAN UNTUK KEBERANGKATAN</p>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<p>No passenger data available.</p>";
                        }
                    } else {
                        ?>
                        <div class="callout callout-warning">
                            <table border="1" style="width: 100%; font-family: Arial, Helvetica, sans-serif; text-align: center;">
                                <!-- ... (your existing table structure) ... -->
                            </table>
                            <p>E-TIKET INI DISIMPAN UNTUK KEBERANGKATAN</p>
                            <button onclick="window.print()">Cetak Tiket</button>
                        </div>
            <?php
                    }
                }
            } else {
                // Display a message if there are no rows in the result set
                echo "<p>No ticket data available.</p>";
            }
            ?>
        </div>
    </section>
</div>