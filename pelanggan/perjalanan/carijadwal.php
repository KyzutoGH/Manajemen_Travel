<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Mode</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><?php echo $_GET['submenu']; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <form method="post" class="form-horizontal" action="index.php?submenu=Dicarikan">
                <h4 style="margin-left: 10px">Cari Jadwal</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="search" class="col-sm-4 control-label">Keyword</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Cari Jadwal" name="keyword" />
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="search" class="col-sm-4 control-label">Kota Keberangkatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Kota Keberangkatan" name="kotaberangkat" />
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="search" class="col-sm-4 control-label">Jenis Kendaraan</label>
                            <div class="col-sm-8">
                                <select name="jeniskendaraan" class="form-control">
                                    <option value="Bus">Bus</option>
                                    <option value="Pesawat">Pesawat</option>
                                    <option value="Kapal">Kapal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="search" class="col-sm-4 control-label">Kota Tujuan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Kota Tujuan" name="kotatujuan" />
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="search" class="col-sm-4 control-label">Tanggal Keberangkatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Tanggal Keberangkatan" name="tanggalberangkat" />
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="search" class="col-sm-4 control-label">Harga</label>
                            <div class="col-sm-8">
                                <select name="hargasort" class="form-control">
                                    <option value="Harga DESC">Termahal ke Termurah</option>
                                    <option value="Harga ASC">Termurah ke Termahal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success pull-right" name="tambah">Cari</button>
                        <a href="../index.php?submenu=<?php echo $subzero ?>" class="btn btn-primary pull-left" style="margin-right: 10px;">Batal</a>
                    </div>
                </div>
                <br />
            </form>
        </div>
    </section>
</div>