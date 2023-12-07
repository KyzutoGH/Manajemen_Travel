<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Transaksi</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Transaksi</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Perjalanan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT j.IDJadwal,
                                    t.IDTransaksi,
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
                                GROUP BY 
                                    t.IDTransaksi, p.NamaPelanggan, j.Diskon, t.StatusTransaksi
                                ");

                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><a href="index.php?submenu=Jadwal&idjadwal=<?php echo $d['IDJadwal']; ?>&cariid=#" title="<?php echo $d['NamaArmada'] . ' - ' . $d['Asal'] . ' - ' . $d['Tujuan']; ?>"><?php echo $d['Perjalanan']; ?></a></td>
                                        <td>
                                            <?php
                                            $timestamp = strtotime($d['Tanggal Transaksi']);
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
                                            $totalHarga = ($jumlahPenumpang == 0) ? $hargaSetelahDiskon : $hargaSetelahDiskon * $jumlahPenumpang;

                                            if ($diskon == 0) {
                                                echo 'Rp ' . number_format($totalHarga, 0, ',', '.');
                                            } elseif ($diskon != 0) {
                                                echo '<del>Rp ' . number_format($harga * $jumlahPenumpang, 0, ',', '.') . '</del><br>Rp ' . number_format($totalHarga, 0, ',', '.');
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <span class="<?php echo ($d['Status'] == 'Belum Dibayar') ? 'label label-danger' : (($d['Status'] == 'Dibayar') ? 'label label-warning' : (($d['Status'] == 'Dibatalkan') ? 'label label-success' : '')); ?>">
                                                <?php echo $d['Status']; ?></span>
                                        </td>
                                        <td>
                                            <?php if (empty($d['BuktiTransaksi'])) : ?>
                                                <!-- Tombol "Kirim Bukti" -->
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#imageModal_<?php echo isset($d['IDTransaksi']) ? $d['IDTransaksi'] : ''; ?>" onclick="showImage()"><span class="fa-file-image-o"></span></button>
                                            <?php else : ?>
                                                <!-- Jika bukti transaksi sudah ada -->
                                                <div class="btn-group">
                                                    <?php if ($d['Status'] == 'Dibatalkan') { ?>
                                                        <button class="btn btn-danger disabled">
                                                            <span class="fa fa-ban"></span> Pesanan Ini Telah Dibatalkan
                                                        </button>
                                                    <?php
                                                    } elseif ($d['Status'] == 'Dibayar') { ?>
                                                        <button class="btn btn-success disabled">
                                                            <span class="fa fa-ban"></span> Pesanan Ini Sudah Dibayar
                                                        </button>
                                                    <?php
                                                    } else { ?>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#imageModal" onclick="showImage()">
                                                            <span class="fa fa-folder-open"></span> Lihat Bukti
                                                        </button>
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#buktiTRX" onclick="showBukti()" style="margin-left: 10px;">
                                                            <span class="fa fa-file-image-o"></span> Kirim Bukti
                                                        </button>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#batalTRX" onclick="showBatal()" style="margin-left: 10px;">
                                                            <span class="fa fa-ban"></span> Batalkan Pesanan
                                                        </button>
                                                    <?php } ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <!-- Modal for each row Lihat Bukti -->
                                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Bukti Transaksi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Jika bukti transaksi sudah ada -->
                                                    <img id="modalImage" src="../dist/img/trxs/<?php echo $d['BuktiTransaksi']; ?>" alt="Tidak Ada Bukti" style="max-width: 100%; height: auto;">
                                                    <p>Bukti transaksi sudah terunggah.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal for each row Kirim Bukti-->
                                    <div class="modal fade" id="buktiTRX" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Bukti Transaksi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulir upload bukti transaksi -->
                                                    <form action="transaksi/uploadbukti.php" method="post" enctype="multipart/form-data">
                                                        <input type="file" name="file" required>
                                                        <input type="hidden" name="IDTransaksi" value="<?php echo $d['IDTransaksi']; ?>">
                                                        <button type="submit" name="simpan" class="btn btn-success">Kirim Bukti</button>
                                                    </form>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal for each row Batalkan-->
                                    <div class="modal fade" id="batalTRX" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Bukti Transaksi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Apakah anda ingin membatalkan pesanan?</h4>
                                                    <!-- Formulir upload bukti transaksi -->
                                                    <form action="transaksi/batalkan.php" method="post">
                                                        <input type="hidden" name="IDTransaksi" value="<?php echo $d['IDTransaksi']; ?>">
                                                        <b>Perjalanan : </b><?php echo $d['NamaArmada'] . ' - ' . $d['Asal'] . ' - ' . $d['Tujuan']; ?><br>
                                                        <b>Tanggal Keberangkatan : </b><?php echo $d['TanggalBerangkat']; ?><br>
                                                        <b>Jumlah Penumpang : </b><?php echo $d['Jumlah Penumpang']; ?><br>
                                                        <b>Harga : </b> <?php if ($diskon == 0) {
                                                                            echo 'Rp ' . number_format($totalHarga, 0, ',', '.');
                                                                        } elseif ($diskon != 0) {
                                                                            echo '<del>Rp ' . number_format($harga * $jumlahPenumpang, 0, ',', '.') . '</del><br>Rp ' . number_format($totalHarga, 0, ',', '.');
                                                                        } ?>
                                                        <button type="submit" name="simpan" class="btn btn-success">Batalkan</button>
                                                    </form>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function showImage() {
        // Menampilkan modal
        $('#imageModal_').modal('show');
    }
</script>