<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Laporan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Laporan</li>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "select * from transaksi");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['NamaArmada']; ?></td>
                                    <td><?php echo $d['Jenis']; ?></td>
                                    <td><?php echo $d['Status']; ?></td>
                                    <td>
                                        <a class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="editarmada.php?id_buku=<?php echo $d['IDArmada']; ?>"></a>
                                        <a class="btn btn-danger glyphicon glyphicon-trash" href="hapusarmada.php?id_buku=<?php echo $d['IDArmada']; ?>"></a>
                                    </td>
                                </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>