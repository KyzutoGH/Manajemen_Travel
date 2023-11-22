<form method="post" class="form-horizontal" action="jadwal/create.php">
    <h4 style="margin-left: 10px">Masukkan Data Jadwal</h4>
    <div class="form-group has-feedback">
        <label for="armada" class="col-sm-2 control-label">Armada</label>
        <div class="col-sm-9" style="width: 930px">
            <?php
            include("../../bagian/koneksi.php");

            $sql = mysqli_query($koneksi, "SELECT IDArmada, NamaArmada, Jenis FROM Armada");
            if (mysqli_num_rows($sql) > 0) {
                echo "<select name='armada' class='form-control' onchange='updateAsalDanKelas(this)'>";

                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<option value='" . $row["IDArmada"] . "' data-jenis='" . $row["Jenis"] . "'>" . $row["NamaArmada"] . "</option>";
                }

                echo "</select>";
            } else {
                echo "Tidak ada data";
            }
            ?>
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="kelas" class="col-sm-2 control-label">Kelas</label>
        <div class="col-sm-9" style="width: 930px">
            <select name="kelas" class="form-control" id="kelasSelect">
            </select>
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="asal" class="col-sm-2 control-label">Asal</label>
        <div class="col-sm-9" style="width: 930px">
            <?php
            // Mendapatkan nilai jenis armada terpilih
            $selectedArmada = isset($_POST['armada']) ? $_POST['armada'] : '';
            $asalValue = ($selectedArmada === 'Bus') ? 'Selorejo' : '';
            echo '<input type="text" class="form-control" placeholder="Asal" name="asal" value="' . $asalValue . '" ' . (($selectedArmada === 'Bus') ? 'readonly' : '') . ' />';
            ?>
        </div>
    </div>

    <div class="form-group has-feedback">
        <label for="tujuan" class="col-sm-2 control-label">Tujuan</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="text" class="form-control" placeholder="Tujuan" name="tujuan" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="tanggalberangkat" class="col-sm-2 control-label">Tanggal Berangkat</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="date" class="form-control" placeholder="Tanggal Lengkap" name="tanggalberangkat" id="tanggalberangkat" onchange="updateTanggalTiba()" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="tanggaltiba" class="col-sm-2 control-label">Tanggal Tiba</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="date" class="form-control" placeholder="Tanggal Lengkap" name="tanggaltiba" id="tanggaltiba" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="berangkat" class="col-sm-2 control-label">Jam Berangkat</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="time" class="form-control" name="berangkat" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="tiba" class="col-sm-2 control-label">Jam Tiba</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="time" class="form-control" name="tiba" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="harga" class="col-sm-2 control-label">Harga (Rp.)</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="number" class="form-control" name="harga" />
        </div>
    </div>
    <div class="form-group has-feedback">
        <label for="diskon" class="col-sm-2 control-label">Diskon</label>
        <div class="col-sm-9" style="width: 930px">
            <input type="number" class="form-control" name="diskon" />
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

<script>
    updateAsalDanKelas(document.querySelector('select[name="armada"]'));

    function updateAsalDanKelas(select) {
        var selectedOption = select.options[select.selectedIndex];
        var jenis = selectedOption.getAttribute('data-jenis');
        var asalInput = document.querySelector('input[name="asal"]');
        var kelasSelect = document.getElementById('kelasSelect');

        if (jenis === 'Bus') {
            // Set nilai asal dan kelas otomatis untuk armada Bus
            asalInput.value = 'Selorejo';
            asalInput.setAttribute('readonly', true);

            kelasSelect.innerHTML = '<option value="Ekonomi">Ekonomi</option>' +
                '<option value="Ekonomi AC">Ekonomi AC</option>' +
                '<option value="Eksekutif">Eksekutif</option>';
        } else {
            // Reset nilai asal dan kelas untuk jenis armada selain Bus
            asalInput.value = '';
            asalInput.removeAttribute('readonly');

            kelasSelect.innerHTML = '<option value="" selected>Tidak Ada Kelas</option>';
        }
    }

    function updateTanggalTiba() {
        var tanggalBerangkat = document.getElementById('tanggalberangkat').value;
        var tanggalTibaInput = document.getElementById('tanggaltiba');

        // Set nilai tanggal tiba sama dengan tanggal berangkat
        tanggalTibaInput.value = tanggalBerangkat;
    }
</script>