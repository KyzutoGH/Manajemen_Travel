<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Armada</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Armada</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="Create/tambah.php?subzero=<?php echo $submenu; ?>" class="btn btn-primary" role="button"><b>+</b> Tambah Armada</a>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Armada</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "select * from armada");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['NamaArmada']; ?></td>
                                    <td><?php if ($d['Jenis'] == "Bus") {
                                        ?><i class="fa fa-bus"></i><?php
                                        } elseif ($d["Jenis"] == "Pesawat") {
                                            ?><i class="fa fa-plane"></i><?php
                                        } elseif ($d["Jenis"] == "Kapal") {
                                        ?><i class="fa fa-ship"></i><?php
                                        }?></td>
                                    <td><?php if ($d["Status"] == "Partner") {
                                        ?><span class="badge bg-green"><?php echo $d["Status"]?></span><?php
                                    } elseif ($d["Status"] == "Non-Partner"){
                                        ?><span class="badge bg-yellow"><?php echo $d["Status"]?></span><?php
                                    }?></td>
                                    <td>
                                        <a class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="Update/update.php?subzero=<?php echo $submenu; ?>&idarmada=<?php echo $d['IDArmada']; ?>"></a>
                                        <a class="btn btn-danger glyphicon glyphicon-trash" href="Delete/hapus.php?subzero=<?php echo $submenu; ?>&idarmada=<?php echo $d['IDArmada']; ?>"></a>
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