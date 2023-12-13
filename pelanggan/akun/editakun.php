<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Akun</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Akun</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <?php
                        $id = $_GET['IDPelanggan'];
                        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE IDPelanggan='$id';");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <form method="post" class="form-horizontal" action="index.php?submenu=EAkunApply">

                                <h4 style="margin-left: 10px">Edit Akun</h4>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="idpelanggan" value="<?php echo $d['IDPelanggan'] ?>">
                                        <input type="text" class="form-control" name="username" value="<?php echo $d['Username']; ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" value="<?php echo $d['Password']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="namapelanggan" class="col-sm-2 control-label">Nama Pelanggan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="namapelanggan" value="<?php echo $d['NamaPelanggan']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nomorhp" class="col-sm-2 control-label">Nomor Handphone</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nomorhp" value="<?php echo $d['NomorHP']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nomoridentitas" class="col-sm-2 control-label">Nomor Identitas</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="nomoridentitas" value="<?php echo $d['NomorIdentitas']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="index.php?submenu=Akun&IDPelanggan=<?php echo $_SESSION['idpelanggan'];?>" class="btn btn-primary">Batal</a>
                                    </div>
                                </div>
                            </form>

                        <?php } ?>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>