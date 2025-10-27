<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Perjalanan</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Perjalanan</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="#" class="cari btn btn-primary" role="button"><b><span class="fa fa-search"></span></b> Cari Jadwal</a>
                        <a href="index.php?submenu=Jadwal" class="btn btn-primary" role="button"><b><span class="fa fa-trash"></span></b> Reset Pencarian</a>
                        <form method="get" class="form-horizontal" id="searchForm" action="">
                            <h4 style="margin-left: 10px">Cari Jadwal</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="search" class="col-sm-4 control-label">Keyword</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Cari Jadwal" name="keyword" />
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="search" class="col-sm-4 control-label">Kota Keberangkatan</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="submenu" value="Jadwal">
                                            <input type="text" class="form-control" placeholder="Kota Keberangkatan" name="kotaberangkat" />
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="search" class="col-sm-4 control-label">Jenis Kendaraan</label>
                                        <div class="col-sm-8">
                                            <select name="jeniskendaraan" class="form-control">
                                                <option value="">Semua Jenis Kendaraan</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Pesawat">Pesawat</option>
                                                <option value="Kapal">Kapal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="search" class="col-sm-4 control-label">Kota Tujuan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Kota Tujuan" name="kotatujuan" />
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="search" class="col-sm-4 control-label">Tanggal Keberangkatan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Tanggal Keberangkatan" name="tanggalberangkat" />
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="search" class="col-sm-4 control-label">Harga</label>
                                        <div class="col-sm-8">
                                            <select name="hargasort" class="form-control">
                                                <option value="Harga DESC">Termahal ke Termurah</option>
                                                <option value="Harga ASC">Termurah ke Termahal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success pull-right" name="cari">Cari</button>
                                </div>
                            </div>
                            <br />
                        </form>
                    </div>

                    <div class="box-body">
                        <div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="text-align: center;">Armada</th>
                                                <th style="text-align: center;">Asal</th>
                                                <th style="text-align: center;">Tujuan</th>
                                                <th style="text-align: center;">Kelas</th>
                                                <th style="text-align: center;">Tanggal</th>
                                                <th style="text-align: center;">Jam Berangkat - Jam Tiba</th>
                                                <th style="text-align: center;">Harga</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            <?php
                                            setlocale(LC_TIME, 'id_ID');
                                            $keyword = '';
                                            $kotaberangkat = '';
                                            $jeniskendaraan = '';
                                            $kotatujuan = '';
                                            $tanggalberangkat = '';
                                            $hargasort = '';

                                            if (isset($_GET["cari"])) {
                                                $keyword = $_GET['keyword'];
                                                $kotaberangkat = $_GET['kotaberangkat'];
                                                $jeniskendaraan = $_GET['jeniskendaraan'];
                                                $kotatujuan = $_GET['kotatujuan'];
                                                $tanggalberangkat = $_GET['tanggalberangkat'];
                                                $hargasort = $_GET['hargasort'];
                                            } elseif (isset($_GET['cariid'])) {
                                                $idjadwal = $_GET['idjadwal'];
                                            }

                                            if (isset($_GET['cari'])) {
                                                $kueri = "SELECT armada.NamaArmada, armada.Jenis, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.TanggalTiba, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada WHERE NamaArmada LIKE '%" . $keyword . "%'";
                                                if ($kotaberangkat != '') {
                                                    $kueri .= "AND Asal='$kotaberangkat'";
                                                } elseif ($jeniskendaraan != '') {
                                                    $kueri .= "AND Jenis='$jeniskendaraan'";
                                                } elseif ($kotatujuan != '') {
                                                    $kueri .= "AND Tujuan='$kotatujuan'";
                                                } elseif ($tanggalberangkat != '') {
                                                    $kueri .= "AND TanggalBerangkat='$tanggalberangkat'";
                                                } elseif ($hargasort != '') {
                                                    $kueri .= "ORDER BY " . $hargasort;
                                                }
                                                $data = mysqli_query($koneksi, $kueri);
                                            } elseif (isset($_GET["cariid"])) {
                                                $data = mysqli_query($koneksi, "SELECT armada.NamaArmada, armada.Jenis, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.TanggalTiba, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada WHERE jadwal.IDJadwal='$idjadwal' AND jadwal.TanggalBerangkat >= CURDATE();");
                                            } else {
                                                $data = mysqli_query($koneksi, "SELECT armada.NamaArmada, armada.Jenis, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.TanggalTiba, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada WHERE jadwal.TanggalBerangkat >= CURDATE();;");
                                            }
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $d['NamaArmada']; ?>&nbsp;
                                                        <?php if ($d['Jenis'] == "Bus") {
                                                        ?><i class="fa fa-bus"></i><?php
                                                                                } elseif ($d["Jenis"] == "Pesawat") {
                                                                                    ?><i class="fa fa-plane"></i><?php
                                                                                                                } elseif ($d["Jenis"] == "Kapal") {
                                                                                                                    ?><i class="fa fa-ship"></i><?php
                                                                                                                                                } ?></td>
                                                    <td><?php echo $d['Asal']; ?></td>
                                                    <td><?php echo $d['Tujuan']; ?></td>
                                                    <td><?php echo $d['Kelas']; ?></td>
                                                    <td>
                                                        <?php
                                                        $tanggalBerangkat = $d['TanggalBerangkat'];
                                                        $timestamp = strtotime($tanggalBerangkat);

                                                        $bulan = array(
                                                            1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni",
                                                            7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"
                                                        );

                                                        $tanggalFormatted = date('d', $timestamp) . ' ' . $bulan[date('n', $timestamp)] . ' ' . date('Y', $timestamp);

                                                        echo $tanggalFormatted;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tanggalBerangkat = $d['TanggalBerangkat'];
                                                        $tanggalTiba = $d['TanggalTiba'];
                                                        $jamBerangkat = $d['JamBerangkat'];
                                                        $jamTiba = $d['JamTiba'];

                                                        // Convert tanggal berangkat and tanggal tiba to DateTime objects for easy calculation
                                                        $datetimeBerangkat = new DateTime($tanggalBerangkat . ' ' . $jamBerangkat);
                                                        $datetimeTiba = new DateTime($tanggalTiba . ' ' . $jamTiba);

                                                        // Calculate the duration
                                                        $interval = $datetimeBerangkat->diff($datetimeTiba);

                                                        $durationDays = $interval->format('%a');
                                                        $durationHours = $interval->format('%h');
                                                        $durationMinutes = $interval->format('%i');

                                                        echo $jamBerangkat . " - " . ' ' . $jamTiba . "<br>";

                                                        if ($durationDays > 0) {
                                                            echo "<br><small><center>" . $durationDays . " hari ";
                                                        }

                                                        echo $durationHours . " jam " . $durationMinutes . " menit</center></small>";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $harga = $d['Harga'];
                                                        $diskon = $d['Diskon'];

                                                        // Menghitung harga setelah diskon
                                                        $hargaSetelahDiskon = $harga - ($harga * ($diskon / 100));

                                                        if ($diskon == 0) {
                                                            // Menampilkan harga setelah diskon dengan format rupiah
                                                            echo 'Rp ' . number_format($hargaSetelahDiskon, 0, ',', '.');
                                                        } elseif ($diskon != 0) {
                                                            // Menampilkan harga asli yang dicoret
                                                            echo '<del>Rp ' . number_format($harga, 0, ',', '.') . '</del>';
                                                            // Menampilkan harga setelah diskon dengan format rupiah
                                                            echo '<br>Rp ' . number_format($hargaSetelahDiskon, 0, ',', '.');
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a class="col-xs-offset-1 btn btn-success fa fa-money" href="index.php?submenu=Pesan&IDJadwal=<?php echo $d['IDJadwal']; ?>"></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    // Hide the form initially
    $(document).ready(function() {
        $('#searchForm').hide();

        $('.cari').on('click', function() {
            $('#searchForm').slideToggle();
        });
    });
</script>