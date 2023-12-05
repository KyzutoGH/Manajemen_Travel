<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Mode</h1>
        <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Tambah <?php if ($subzero == "Armada") {
                                            echo 'Armada';
                                        } ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <form method="get" class="form-horizontal" action="index.php?submenu=Bayar">
                <h4 style="margin-left: 10px">Masukkan Transaksi</h4>
                <div class="form-group has-feedback">
                    <label for="jadwal" class="col-sm-2 control-label">Jadwal Perjalanan</label>
                    <div class="col-sm-9" style="width: 930px">
                        <?php
                        include("../bagian/koneksi.php");

                        $sqlJadwal = mysqli_query($koneksi, "SELECT Jadwal.IDJadwal, Jadwal.Asal, Jadwal.Tujuan, Jadwal.TanggalBerangkat, Armada.NamaArmada FROM Jadwal JOIN Armada ON Jadwal.IDArmada = Armada.IDArmada;");
                        if (mysqli_num_rows($sqlJadwal) > 0) {
                            echo "<select name='idjadwal' class='form-control'>";

                            while ($rowJadwal = mysqli_fetch_assoc($sqlJadwal)) {
                                echo "<option value='" . $rowJadwal["IDJadwal"] . "'>" . $rowJadwal["NamaArmada"] . ' : ' . $rowJadwal['Asal'] . ' - ' . $rowJadwal['Tujuan'] . ' - ' . $rowJadwal['TanggalBerangkat'] . "</option>";
                            }

                            echo "</select>";
                        } else {
                            echo "Tidak ada data";
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="penumpang" class="col-sm-2 control-label">Nama Pelanggan</label>
                    <div class="col-sm-9" style="width: 930px">
                        <?php
                        include("../bagian/koneksi.php");
                        $idplg = $_GET['IDPelanggan'];
                        $sqlPelanggan = mysqli_query($koneksi, "SELECT IDPelanggan, NamaPelanggan FROM Pelanggan WHERE IDPelanggan=$idplg");
                        if ($x = mysqli_fetch_assoc($sqlPelanggan)) {
                        ?>
                            <input type="text" class="form-control" name="namapenumpang" value="<?php echo $x['NamaPelanggan']; ?>" readonly>
                        <?php
                        } else {
                            echo "Tidak ada data";
                        }
                        ?>

                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="jumlah_penumpang" class="col-sm-2 control-label">Jumlah Penumpang</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="number" class="form-control" name="jumlah_penumpang" min="1" value="1">
                    </div>
                </div>
                <div id="passenger-details"></div>

                <div class="form-group has-feedback">
                    <div class="col-sm-10 pull-right">
                        <button type="submit" class="btn btn-success pull-right" name="submenu" value="Bayar">
                            Simpan
                        </button>
                        <a href="../index.php?submenu=Jadwal" class="pull-left btn btn-primary" style="margin-left: 0px">Batal</a>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="col-sm-10 pull-right">
                        <p><b style="color: red;">NOTE! : </b>Ubah jumlah penumpang untuk menginput penumpang</p>
                    </div>
                </div>
            </form>


            <script>
                // Add input fields for each passenger based on the selected quantity (up to 8)
                document.querySelector('input[name="jumlah_penumpang"]').addEventListener('change', function() {
                    const quantity = parseInt(this.value);
                    const maxPassengers = 8; // Set the maximum number of passengers

                    const validQuantity = Math.min(quantity, maxPassengers);

                    this.value = validQuantity;

                    const passengerDetailsDiv = document.getElementById('passenger-details');

                    passengerDetailsDiv.innerHTML = '';

                    for (let i = 1; i <= validQuantity; i++) {
                        passengerDetailsDiv.innerHTML += `<div class="form-group has-feedback">
                <label for="idpenumpang_${i}" class="col-sm-2 control-label">Penumpang ${i}</label>
                <div class="col-sm-9" style="width: 930px">
                    <select class="form-control" name="idpenumpang_${i}">
                        <?php
                        $idplgx = $_SESSION['idpelanggan'];
                        $sqlPenumpang = mysqli_query($koneksi, "SELECT IDPenumpang, NamaPenumpang FROM penumpang WHERE IDPelanggan = $idplgx;");
                        while ($rowPenumpang = mysqli_fetch_assoc($sqlPenumpang)) {
                            echo "<option value='" . $rowPenumpang["IDPenumpang"] . "'>" . $rowPenumpang["NamaPenumpang"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>`;
                    }
                });
            </script>
        </div>
    </section>
</div>