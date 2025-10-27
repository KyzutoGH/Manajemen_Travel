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
                    <div class="box-header">
                        <!-- <a href="Create/tambah.php?subzero=<?php echo $submenu; ?>" class="btn btn-primary" role="button"><b>+</b> Tambah Transaksi (Non-Pelanggan)</a> -->
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelanggan</th>
                                    <th>Perjalanan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Harga</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT j.IDJadwal,
                                t.BuktiTransaksi,
                                a.NamaArmada,
                                t.IDTransaksi,
                                j.Asal,
                                j.Tujuan,
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
                                        <td><a href="index.php?submenu=Detail&idtrx=<?php echo $d['ID Transaksi'] ?>"><?php echo $d['Nama Pelanggan']; ?></a></td>
                                        <td><a href="index.php?submenu=Jadwal&idjadwal=<?php echo $d['IDJadwal']; ?>" title="<?php echo $d['NamaArmada'] . ' - ' . $d['Asal'] . ' - ' . $d['Tujuan']; ?>"><?php echo $d['Perjalanan']; ?></a></td>
                                        <td>
                                            <?php
                                            $tanggalBerangkat = $d['Tanggal Transaksi'];
                                            $timestamp = strtotime($tanggalBerangkat);

                                            $bulan = array(
                                                1 => "JANUARI", 2 => "FEBRUARI", 3 => "MARET", 4 => "APRIL", 5 => "MEI", 6 => "JUNI",
                                                7 => "JULI", 8 => "AGUSTUS", 9 => "SEPTEMBER", 10 => "OKTOBER", 11 => "NOVEMBER", 12 => "DESEMBER"
                                            );

                                            $tanggalFormatted = date('d', $timestamp) . ' ' . $bulan[date('n', $timestamp)] . ' ' . date('Y', $timestamp);

                                            echo $tanggalFormatted;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $harga = $d['Harga'];
                                            $jumlahPenumpang = $d['Jumlah Penumpang']; // Ganti dengan kode yang mengambil jumlah penumpang

                                            if ($jumlahPenumpang == 0) {
                                                // Menghitung total harga berdasarkan jumlah penumpang
                                                $totalHarga = $harga * 1;
                                            } elseif ($jumlahPenumpang != 0) {
                                                $totalHarga = $harga * $jumlahPenumpang;
                                            }
                                                // Menampilkan total harga dengan format rupiah
                                                echo 'Rp ' . number_format($totalHarga, 0, ',', '.');
                                            
                                            ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#imageModal__<?php echo $d['IDTransaksi']; ?>">Tampilkan Bukti</button>
                                        </td>

                                        <!-- Modal for each row Lihat Bukti -->
                                        <div class="modal fade" id="imageModal__<?php echo $d['IDTransaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
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
                                        <td>
                                            <span class="<?php echo ($d['Status'] == 'Belum Dibayar') ? 'label label-danger' : (($d['Status'] == 'Dibayar') ? 'label label-warning' : (($d['Status'] == 'Dibatalkan') ? 'label label-success' : '')); ?>">
                                                <?php echo $d['Status']; ?></span>
                                        </td>
                                        <td>
                                            <?php if ($d['Status'] === 'Dibatalkan') { ?>
                                                <span class="label label-danger">Transaksi Dibatalkan</span>

                                            <?php } elseif ($d['Status'] === 'Dibayar') { ?>
                                                <span class="label label-success">Transaksi Sudah Dibayar</span>
                                            <?php } else { ?>
                                                <a class="col-xs-offset-1" href="Update/transaksi/bayar.php?idtrx=<?php echo $d['ID Transaksi']; ?>"><span class="label label-success">Konfirmasi</span></a>
                                                <a class="col-xs-offset-1" href="Update/transaksi/batal.php?idtrx=<?php echo $d['ID Transaksi']; ?>"><span class="label label-danger">Tidak Valid</span></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
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
    function performAction(action, $id) {
        if (action === 'detail') {
            window.location.href = 'detail.php?subzero=<?php echo $submenu; ?>&idtransaksi=' + id;

        } else if (action === 'konfirmasi') {
            window.location.href = 'update/transaksi/bayar.php?idtrx=<?php echo $d["ID Transaksi"]; ?>';

        } else if (action === 'batalkan') {
            window.location.href = 'update/transaksi/batal.php?idtrx=<?php echo $d["ID Transaksi"]; ?>';
        }
    }
    // JavaScript
    function showImage() {

        // Menampilkan modal
        $('#imageModal').modal('show');
    }
</script>