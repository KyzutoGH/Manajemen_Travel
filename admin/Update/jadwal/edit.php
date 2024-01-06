<?php
$id = $_GET['idjadwal'];
$data = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE IDJadwal='$id';");
while ($d = mysqli_fetch_array($data)) {
?>
    <form method="post" class="form-horizontal" action="jadwal/apply.php">

        <h4 style="margin-left: 10px">Edit Diskon</h4>

        <div class="form-group has-feedback">
            <label for="harga" class="col-sm-2 control-label">Harga (Rp.)</label>
            <div class="col-sm-9" style="width: 930px">
            <input type="hidden" name="idjadwal" value="<?php echo $d['IDJadwal']?>">
                <input type="number" class="form-control" name="harga" value="<?php echo $d['Harga']; ?>" readonly />
            </div>
        </div>

        <div class="form-group has-feedback">
            <label for="diskon" class="col-sm-2 control-label">Diskon (Dalam Persen)</label>
            <div class="col-sm-9" style="width: 930px">
                <input type="number" class="form-control" name="diskon" value="<?php echo $d['Diskon']; ?>" />
            </div>
        </div>

        <div class="form-group has-feedback">
            <div class="col-sm-10 pull-right">
                <button type="submit" class="btn btn-success">
                    Simpan Diskon
                </button>
                <a href="../index.php?submenu=<?php echo $subzero ?>" class="pull-left btn btn-primary" style="margin-left: 0px">Batal</a>
            </div>
        </div>
        <br />
    </form>

<?php } ?>
