<?php
$id = $_GET['IDPelanggan'];
$data = mysqli_query($koneksi, "select * from pelanggan where IDPelanggan='$id'");
while ($d = mysqli_fetch_array($data)) {
?>
    <form method="post" class="form-horizontal" action="pelanggan/apply.php">
        <h4 style="margin-left: 10px">Masukkan Data Pelanggan</h4>
        <div class="form-group has-feedback">
            <label for="kode" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="hidden" name="id" value="<?php echo $d['IDPelanggan']; ?>">
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $d['Username']; ?>" />
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="kode" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $d['Password']; ?>" />
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="kode" class="col-sm-2 control-label">Nama Pelanggan</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama" value="<?php echo $d['NamaPelanggan']; ?>" />
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="kode" class="col-sm-2 control-label">Nomor Handphone</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="number" class="form-control" placeholder="Nomor Handphone" name="nomorhp" value="<?php echo $d['NomorHP']; ?>" />
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="kode" class="col-sm-2 control-label">Nomor Identitas</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="number" class="form-control" placeholder="Nomor Identitas" name="nomoridentitas" value="<?php echo $d['NomorIdentitas']; ?>" />
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

<?php } ?>