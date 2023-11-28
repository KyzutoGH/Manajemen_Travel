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
                    </div>
                    <div class="box-body">
                        <form method="post" class="form-horizontal" action="jadwal/create.php">
                            <h4 style="margin-left: 10px">Detail Transaksi</h4>
                            <div class="form-group has-feedback">
                                <label for="tujuan" class="col-sm-2 control-label">Tujuan</label>
                                <div class="col-sm-9" style="width: 930px">
                                    <input type="text" class="form-control" placeholder="Tujuan" name="tujuan" />
                                </div>
                            </div>
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
                </div>
            </div>
        </div>
    </section>
</div>