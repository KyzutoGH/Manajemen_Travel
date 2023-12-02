<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Mode</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><?php echo $_GET['submenu'];?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <form method="post" class="form-horizontal" action="index.php?submenu=Jadwal">
                <h4 style="margin-left: 10px">Cari Jadwal</h4>
                <div class="form-group has-feedback">
                    <label for="search" class="col-sm-2 control-label">Cari Jadwal</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="text" class="form-control" placeholder="Cari Jadwal" name="search" />
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="asalSearch" class="col-sm-2 control-label">Asal</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="text" class="form-control" placeholder="Asal" name="asalSearch" />
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="tujuanSearch" class="col-sm-2 control-label">Tujuan</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="text" class="form-control" placeholder="Tujuan" name="tujuanSearch" />
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="jenisSearch" class="col-sm-2 control-label">Jenis</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="text" class="form-control" placeholder="Jenis" name="jenisSearch" />
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="kelasSearch" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="text" class="form-control" placeholder="Kelas" name="kelasSearch" />
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="tanggalberangkatSearch" class="col-sm-2 control-label">Tanggal Berangkat</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="date" class="form-control" placeholder="Tanggal Berangkat" name="tanggalberangkatSearch" />
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="hargaSearch" class="col-sm-2 control-label">Harga</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="number" class="form-control" placeholder="Harga" name="hargaSearch" />
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="diskonSearch" class="col-sm-2 control-label">Diskon</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="number" class="form-control" placeholder="Diskon" name="diskonSearch" />
                    </div>
                </div>

                <!-- Existing form fields ... -->

                <div class="form-group has-feedback">
                    <div class="col-sm-10 pull-right">
                        <button type="submit" class="btn btn-success" name="tambah">
                            Simpan
                        </button>
                        <a href="../index.php?submenu=<?php echo $subzero ?>" class="pull-left btn btn-primary" style="margin-left: 0px">Batal</a>
                    </div>
                </div>
                <br />
            </form>
        </div>
    </section>
</div>