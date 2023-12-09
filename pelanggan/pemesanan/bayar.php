<div class="content-wrapper">
    <section class="content-header">
        <h1>Portal Pembayaran</h1>
        <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><?php if ($submenu == "Bayar") {
                                    echo 'Bayar';
                                } ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <form method="post" class="form-horizontal" action="pemesanan/paid.php">
                <h4 style="margin-left: 10px">Pilih Metode Pembayaran</h4>

                <div class="form-group has-feedback">
                    <label for="penumpang" class="col-sm-2 control-label">Nama Perjalanan</label>
                    <div class="col-sm-9" style="width: 930px">
                        <?php
                        include("../bagian/koneksi.php");
                        $idtrxf = $_GET['IDTransaksi'];
                        $sqlJadwal = mysqli_query($koneksi, "SELECT
                        Transaksi.IDTransaksi,
                        Transaksi.IDPelanggan,
                        Transaksi.IDJadwal,
                        Transaksi.TanggalTransaksi,
                        Transaksi.TotalHarga,
                        Transaksi.BuktiTransaksi,
                        Transaksi.StatusTransaksi,
                        Jadwal.IDJadwal,
                        Jadwal.IDArmada,
                        Jadwal.Asal,
                        Jadwal.Tujuan,
                        Jadwal.Kelas,
                        Jadwal.TanggalBerangkat,
                        Jadwal.TanggalTiba,
                        Jadwal.JamBerangkat,
                        Jadwal.JamTiba,
                        Jadwal.Harga,
                        Jadwal.Diskon,
                        Armada.IDArmada,
                        Armada.NamaArmada,
                        Armada.Jenis,
                        Armada.Status,
                        DetailTransaksi.IDDetailTransaksi,
                        DetailTransaksi.IDPenumpang,
                        DetailTransaksi.HargaTiket
                    FROM
                        Transaksi
                    JOIN Jadwal ON Transaksi.IDJadwal = Jadwal.IDJadwal
                    JOIN Armada ON Jadwal.IDArmada = Armada.IDArmada
                    LEFT JOIN DetailTransaksi ON Transaksi.IDTransaksi = DetailTransaksi.IDTransaksi
                    WHERE
                        Transaksi.IDTransaksi = $idtrxf;
                    ");
                        if ($x = mysqli_fetch_assoc($sqlJadwal)) {
                        ?><input type="hidden" class="form-control" name="IDTransaksi" value="<?php echo $x['IDTransaksi']; ?>" readonly>
                            <input type="text" class="form-control" name="namapelanggan" value="<?php echo $x['NamaArmada'] . ' - ' . $x['Asal'] . ' - ' . $x['Tujuan']; ?>" readonly>
                        <?php
                        } else {
                            echo "Tidak ada data";
                        }
                        ?>

                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="penumpang" class="col-sm-2 control-label">Nama Penumpang</label>
                    <div class="col-sm-9" style="width: 930px">
                        <?php
                        $idtrxf = $_GET['IDTransaksi'];
                        // Ambil data penumpang dari tabel DetailTransaksi
                        $sqlPenumpang = mysqli_query($koneksi, "SELECT Penumpang.NamaPenumpang 
                        FROM DetailTransaksi 
                        JOIN Penumpang ON DetailTransaksi.IDPenumpang = Penumpang.IDPenumpang
                        WHERE DetailTransaksi.IDTransaksi = $idtrxf");
                        while ($penumpang = mysqli_fetch_assoc($sqlPenumpang)) {
                            echo "<input type='text' class='form-control' value='" . $penumpang['NamaPenumpang'] . "' readonly><br>";
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="penumpang" class="col-sm-2 control-label">Harga</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="text" class="form-control" name="harga" value="<?php $harga = $x['Harga'];
                                                                                    echo 'Rp ' . number_format($harga, 0, ',', '.'); ?>" readonly>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="penumpang" class="col-sm-2 control-label">Metode Pembayaran</label>
                    <div class="col-sm-9" style="width: 930px">
                        <!-- Tambahkan elemen untuk menampilkan metode pembayaran -->
                        <!-- Misalnya, menggunakan dropdown atau input teks sesuai kebutuhan -->
                        <select class="form-control" name="rekening">
                            <option value="BCA">Bank Central Asia - 5410425787 - a/n Thiccket Rahayu</option>
                            <option value="BRI">Bank Rakyat Irlandia - 6371-01-009955-53-4 - a/n Raja Tiket Rahayu</option>
                            <option value="Universal">Bang Jago - 1015 9199 1834 - a/n Ratu Rahayu Tiket</option>
                        </select>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-sm-10 pull-right">
                        <button type="submit" class="btn btn-success pull-right" name="submenu" value="Insert">
                            Simpan
                        </button>
                        <a href="index.php?submenu=Jadwal" class="pull-left btn btn-primary" style="margin-left: 0px">Batal</a>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="col-sm-10 pull-right">
                        <p><b style="color: red;">NOTE! : </b>Catat Nomor Rekening untuk Transfer</p>
                    </div>
                </div>
            </form>


        </div>
    </section>
</div>