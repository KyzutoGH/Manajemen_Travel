<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Pelanggan</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Pelanggan</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="Create/tambah.php?subzero=<?php echo $submenu; ?>" class="btn btn-primary" role="button"><b>+</b> Tambah Pelanggan</a>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nomor HP</th>
                                    <th>Nomor Identitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "select * from pelanggan");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['Username']; ?></td>
                                    <td>
                                        <?php
                                        $passwordLength = strlen($d['Password']);
                                        echo str_repeat('*', $passwordLength);
                                        ?></td>
                                    <td><?php echo $d['NamaPelanggan']; ?></td>
                                    <td><?php echo $d['NomorHP']; ?></td>
                                    <td><?php echo $d['NomorIdentitas']; ?></td>
                                    <td>
                                        <a class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="Update/update.php?subzero=<?php echo $submenu; ?>&IDPelanggan=<?php echo $d['IDPelanggan']; ?>"></a>
                                        <a class="btn btn-danger glyphicon glyphicon-trash" disabled title="Tidak Dapat Menghapus Pelanggan, Silahkan Buat Yang Baru Mohon Maaf." href="Delete/hapus.php?subzero=<?php echo $submenu; ?>&IDPelanggan=<?php echo $d['IDPelanggan']; ?>"></a>
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