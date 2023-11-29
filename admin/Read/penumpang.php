<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Penumpang</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Penumpang</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="Create/tambah.php?subzero=<?php echo $submenu; ?>" class="btn btn-primary" role="button"><b>+</b> Tambah Penumpang</a>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Penumpang</th>
                                    <th>Nomor Identitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT pelanggan.IDPelanggan, pelanggan.NamaPelanggan, pelanggan.NomorHP, penumpang.IDPenumpang, penumpang.NamaPenumpang, penumpang.NomorIdentitas FROM penumpang JOIN pelanggan ON penumpang.IDPelanggan = pelanggan.IDPelanggan;");
                                $lastNamaPelanggan = null;
                                $colspanCount = 1;

                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php
                                            // Check if NamaPelanggan is the same as the last one
                                            if ($lastNamaPelanggan == $d['NamaPelanggan']) {
                                                // If yes, increase colspanCount
                                                $colspanCount++;
                                            } else {
                                                // If not, reset colspanCount
                                                $colspanCount = 1;
                                            }

                                            // Print NamaPelanggan only if it's the first row or if it's different from the last one
                                            if ($colspanCount == 1) {
                                                echo $d['NamaPelanggan'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $d['NamaPenumpang']; ?></td>
                                        <td><?php echo $d['NomorIdentitas']; ?></td>
                                        <td>
                                            <a class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="update/update.php?subzero=Penumpang&IDPenumpang=<?php echo $d['IDPenumpang']; ?>"></a>
                                            <a class="btn btn-danger glyphicon glyphicon-trash" href="delete/hapus.php?subzero=Penumpang&IDPenumpang=<?php echo $d['IDPenumpang']; ?>"></a>
                                        </td>
                                    </tr>
                                <?php
                                    // Update lastNamaPelanggan for the next iteration
                                    $lastNamaPelanggan = $d['NamaPelanggan'];
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