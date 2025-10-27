<form method="post" class="form-horizontal" action="penumpang/create.php">
    <h4 style="margin-left: 10px">Masukkan Data Jadwal</h4>
    <div class="form-group has-feedback">
        <label for="armada" class="col-sm-2 control-label">Nama Penumpang</label>
        <div class="col-sm-9" style="width: 930px">
            <?php
            include("../../bagian/koneksi.php");

            $sql = mysqli_query($koneksi, "SELECT IDPelanggan, NamaPelanggan FROM Pelanggan");
            if (mysqli_num_rows($sql) > 0) {
                echo "<select name='idpelanggan' class='form-control'>";

                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<option value='" . $row["IDPelanggan"] . "'>" . $row["NamaPelanggan"] . "</option>";
                }

                echo "</select>";
            } else {
                echo "Tidak ada data";
            }
            ?>
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="kelas" class="col-sm-2 control-label">Nama Penumpang</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="text" class="form-control" placeholder="Nama Penumpang" name="nama" />
        </div>
    </div>

    <div class="form-group has-feedback">
        <label for="tujuan" class="col-sm-2 control-label">Nomor Identitas</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="text" class="form-control" placeholder="Nomor Identitas" name="nomoridentitas" />
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