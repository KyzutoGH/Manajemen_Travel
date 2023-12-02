<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Perjalanan</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="index.php?submenu=Pencarian" class="btn btn-primary" role="button"><b><span class="fa fa-search"></span></b> Cari Jadwal</a>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
                            <thead>
                                <tr>
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
                            <tbody>
                                <tr>
                                    <?php
                                    setlocale(LC_TIME, 'id_ID');
                                    if (isset($_POST['search']) || isset($_POST['asalSearch']) || isset($_POST['tujuanSearch']) || isset($_POST['jenisSearch']) || isset($_POST['kelasSearch']) || isset($_POST['tanggalberangkatSearch']) || isset($_POST['hargaSearch']) || isset($_POST['diskonSearch'])) {
                                        $search = mysqli_real_escape_string($koneksi, $_POST['search']);
                                        $asalSearch = mysqli_real_escape_string($koneksi, $_POST['asalSearch']);
                                        $tujuanSearch = mysqli_real_escape_string($koneksi, $_POST['tujuanSearch']);
                                        $jenisSearch = mysqli_real_escape_string($koneksi, $_POST['jenisSearch']);
                                        $kelasSearch = mysqli_real_escape_string($koneksi, $_POST['kelasSearch']);
                                        $tanggalberangkatSearch = mysqli_real_escape_string($koneksi, $_POST['tanggalberangkatSearch']);
                                        $hargaSearch = mysqli_real_escape_string($koneksi, $_POST['hargaSearch']);
                                        $diskonSearch = mysqli_real_escape_string($koneksi, $_POST['diskonSearch']);

                                        // Modify your SQL query to include the search conditions
                                        $sql = "SELECT * FROM jadwal WHERE NamaJadwal LIKE '%$search%'";

                                        // Add other conditions as needed
                                        if (!empty($asalSearch)) {
                                            $sql .= " AND Asal = '$asalSearch'";
                                        }
                                        if (!empty($tujuanSearch)) {
                                            $sql .= " AND Tujuan = '$tujuanSearch'";
                                        }
                                        if (!empty($jenisSearch)) {
                                            $sql .= " AND Jenis = '$jenisSearch'";
                                        }
                                        if (!empty($kelasSearch)) {
                                            $sql .= " AND Kelas = '$kelasSearch'";
                                        }
                                        if (!empty($tanggalberangkatSearch)) {
                                            $sql .= " AND TanggalBerangkat = '$tanggalberangkatSearch'";
                                        }
                                        if (!empty($hargaSearch)) {
                                            $sql .= " AND Harga = $hargaSearch";
                                        }
                                        if (!empty($diskonSearch)) {
                                            $sql .= " AND Diskon = $diskonSearch";
                                        }

                                        $result = mysqli_query($koneksi, $sql);
                                    } else {
                                        $data = mysqli_query($koneksi, "SELECT * FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada;");
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
                                        <button class="col-xs-offset-1 btn btn-success fa fa-money" href="update.php?id_buku=<?php echo $d['IDJadwal']; ?>"></button>
                                    </td>
                                </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>