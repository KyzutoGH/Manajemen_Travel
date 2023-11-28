<form method="post" class="form-horizontal" action="pelanggan/create.php">
    <h4 style="margin-left: 10px">Masukkan Data Pelanggan</h4>
    <div class="form-group has-feedback">
        <label for="kode" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="text" class="form-control" placeholder="Username" name="username" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="kode" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="text" class="form-control" placeholder="Password" name="password" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="kode" class="col-sm-2 control-label">Nama Pelanggan</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="kode" class="col-sm-2 control-label">Nomor Handphone</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="number" class="form-control" placeholder="Nomor Handphone" name="nomorhp" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="kode" class="col-sm-2 control-label">Nomor Identitas</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="number" class="form-control" placeholder="Nomor Identitas" name="nomoridentitas" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <div class="col-sm-10 pull-right">
            <button type="submit" class="btn btn-success pull-right" name="tambah">
                Simpan
            </button>
            <a href="../index.php?submenu=<?php echo $subzero ?>" class="pull-left btn btn-primary" style="margin-left: 0px">Batal</a>
        </div>
    </div>
    <br />
</form>