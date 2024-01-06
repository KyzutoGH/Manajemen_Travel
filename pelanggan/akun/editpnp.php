<div class="content-wrapper">
    <section class="content-header">
        <h1>Manajemen Penumpang</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Akun&IDPelanggan=<?php echo $_GET['IDPelanggan'];?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Penumpang</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button class="col-xs-offset-1 btn btn-success glyphicon glyphicon-plus" data-toggle="modal" data-target="#tambahModal" title="Tambah Penumpang"></button>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penumpang</th>
                                    <th>Nomor Identitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_GET['IDPelanggan'];
                                $data = mysqli_query($koneksi, "SELECT * FROM penumpang WHERE IDPelanggan='$id';");
                                $no = 0;
                                while ($d = mysqli_fetch_array($data)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d['NamaPenumpang']; ?></td>
                                        <td><?php echo $d['NomorIdentitas']; ?></td>
                                        <td>
                                            <button class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#editModal_<?php echo $d['IDPenumpang']; ?>"></button>
                                            <button class="btn btn-danger glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal_<?php echo $d['IDPenumpang']; ?>"></button>
                                        </td>
                                    </tr>
                                    <!-- MODAL EDIT -->
                                    <div class="modal fade" id="editModal_<?php echo $d['IDPenumpang']; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Edit Penumpang</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" class="form-horizontal" action="index.php?submenu=EPenumpangApply">
                                                        <input type="hidden" name="idpelanggan" value="<?php echo $d['IDPelanggan'] ?>">
                                                        <input type="hidden" name="idpenumpang" value="<?php echo $d['IDPenumpang'] ?>">
                                                        <div class="form-group">
                                                            <label for="namapenumpang" class="col-sm-3 control-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="namapenumpang" value="<?php echo $d['NamaPenumpang']; ?>" /><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nomoridentitas" class="col-sm-3 control-label">Nomor ID</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="nomoridentitas" value="<?php echo $d['NomorIdentitas']; ?>" /><br>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" id="deleteModal_<?php echo $d['IDPenumpang']; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Hapus Penumpang</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: red; font-weight: bold;">Apakah Anda yakin ingin menghapus penumpang berikut ini?</p>
                                                    <form method="post" class="form-horizontal" action="index.php?submenu=HPenumpangApply">
                                                        <input type="hidden" name="idpelanggan" value="<?php echo $d['IDPelanggan'] ?>">
                                                        <input type="hidden" name="idpenumpang" value="<?php echo $d['IDPenumpang'] ?>">
                                                        <div class="form-group">
                                                            <label for="namapenumpang" class="col-sm-3 control-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="namapenumpang" value="<?php echo $d['NamaPenumpang']; ?>" readonly/><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nomoridentitas" class="col-sm-3 control-label">Nomor ID</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="nomoridentitas" value="<?php echo $d['NomorIdentitas']; ?>" readonly/><br>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Yakin</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- MODAL TAMBAH -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel">Tambah Penumpang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" class="form-horizontal" action="index.php?submenu=TPenumpangApply">
                                            <input type="hidden" name="idpelanggan" value="<?php echo $_GET['IDPelanggan'] ?>">
                                            <div class="form-group">
                                                <label for="namapenumpang" class="col-sm-3 control-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="namapenumpang"/><br>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nomoridentitas" class="col-sm-3 control-label">Nomor ID</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nomoridentitas"/><br>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>