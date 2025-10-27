<?php
$id = $_GET['IDPenumpang'];
$data = mysqli_query($koneksi, "SELECT pelanggan.IDPelanggan, pelanggan.NamaPelanggan, pelanggan.NomorHP, penumpang.IDPenumpang, penumpang.NamaPenumpang, penumpang.NomorIdentitas FROM penumpang JOIN pelanggan ON penumpang.IDPelanggan = pelanggan.IDPelanggan WHERE IDPenumpang='$id';");
while ($d = mysqli_fetch_array($data)) {
?>
    <form method="post" class="form-horizontal" action="penumpang/apply.php">
        <h4 style="margin-left: 10px">Masukkan Data Jadwal</h4>
        <div class="form-group has-feedback">
            <label for="armada" class="col-sm-2 control-label">Nama Penumpang</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="hidden" name="idpenumpang" value="<?php echo $d['IDPenumpang']; ?>" />
                <input type="text" class="form-control" placeholder="Nama Pelanggan" name="namapelanggan" value="<?php echo $d['NamaPelanggan']; ?>" disabled />
            </div>
        </div>
        <div class="form-group has-feedback">
            <label for="kelas" class="col-sm-2 control-label">Nama Penumpang</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="text" class="form-control" placeholder="Nama Penumpang" name="nama" value="<?php echo $d['NamaPenumpang']; ?>" />
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="tujuan" class="col-sm-2 control-label">Nomor Identitas</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="text" class="form-control" placeholder="Nomor Identitas" name="nomoridentitas" value="<?php echo $d['NomorIdentitas']; ?>" />
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