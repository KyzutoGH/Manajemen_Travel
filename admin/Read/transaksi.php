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
                        <a href="Create/tambah.php?subzero=<?php echo $menu; ?>" class="btn btn-primary" role="button"><b>+</b> Tambah Armada</a>
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
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT pelanggan.NamaPelanggan, armada.NamaArmada, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, transaksi.TanggalTransaksi, detailtransaksi.HargaTiket, transaksi.StatusTransaksi FROM transaksi JOIN pelanggan ON transaksi.IDPelanggan = pelanggan.IDPelanggan JOIN detailtransaksi ON transaksi.IDTransaksi = detailtransaksi.IDTransaksi JOIN penumpang ON detailtransaksi.IDPenumpang = penumpang.IDPenumpang JOIN jadwal ON transaksi.IDJadwal = jadwal.IDJadwal JOIN armada ON jadwal.IDArmada = armada.IDArmada");

                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['NamaPelanggan']; ?></td>
                                        <td><?php echo $d['NamaArmada']; ?></td>
                                        <td><?php echo $d['Asal']; ?></td>
                                        <td><?php echo $d['Tujuan']; ?></td>
                                        <td><?php echo $d['Kelas']; ?></td>
                                        <td><?php echo $d['TanggalTransaksi']; ?></td>
                                        <td><?php echo $d['HargaTiket']; ?></td>
                                        <td><?php echo $d['StatusTransaksi']; ?></td>
                                        <td>
                                            <a class="btn btn-success glyphicon glyphicon-pencil" href="editarmada.php?id_transaksi=<?php echo $d['IDTransaksi']; ?>"></a>
                                            <a class="btn btn-danger glyphicon glyphicon-trash" href="hapusarmada.php?id_transaksi=<?php echo $d['IDTransaksi']; ?>"></a>
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