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
                        <a href="index.php?submenu=Pencarian" class="btn btn-primary" role="button"><b><span class="fa fa-search"></span></b> Cari Jadwal</a>
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

                                            $keyword = $_POST['keyword'];
                                            $kotaberangkat = $_POST['kotaberangkat'];
                                            $jeniskendaraan = $_POST['jeniskendaraan'];
                                            $kotatujuan = $_POST['kotatujuan'];
                                            $tanggalberangkat = $_POST['tanggalberangkat'];
                                            $hargasort = $_POST['hargasort'];
                                            $result = mysqli_query($koneksi, "SELECT * FROM armada 
    JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada 
    WHERE Armada.NamaArmada LIKE ? 
      AND (Jadwal.Asal = ? OR Jadwal.Asal IS NULL OR Jadwal.Asal = '')
      AND (Jadwal.Tujuan = ? OR Jadwal.Tujuan IS NULL OR Jadwal.Tujuan = '')
      AND (Armada.Jenis = ? OR Armada.Jenis IS NULL OR Armada.Jenis = '')
      AND (Jadwal.TanggalBerangkat = ? OR Jadwal.TanggalBerangkat IS NULL OR Jadwal.TanggalBerangkat = '')
    ORDER BY $hargasort;");

                                            // Assuming you have the values for parameters
                                            $searchNamaArmada = '%' . $keyword . '%';
                                            $searchAsal = $kotaberangkat;
                                            $searchTujuan = $kotatujuan;
                                            $searchJenis = $jeniskendaraan;
                                            $searchTanggalBerangkat = $tanggalberangkat;

                                            // Use prepared statement to bind parameters
                                            $stmt = mysqli_prepare($koneksi, "SELECT * FROM armada 
    JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada 
    WHERE Armada.NamaArmada LIKE ? 
      AND (Jadwal.Asal = ? OR Jadwal.Asal IS NULL OR Jadwal.Asal = '')
      AND (Jadwal.Tujuan = ? OR Jadwal.Tujuan IS NULL OR Jadwal.Tujuan = '')
      AND (Armada.Jenis = ? OR Armada.Jenis IS NULL OR Armada.Jenis = '')
      AND (Jadwal.TanggalBerangkat = ? OR Jadwal.TanggalBerangkat IS NULL OR Jadwal.TanggalBerangkat = '')
    ORDER BY $hargasort;");

                                            mysqli_stmt_bind_param($stmt, 'sssss', $searchNamaArmada, $searchAsal, $searchTujuan, $searchJenis, $searchTanggalBerangkat);

                                            // Execute the prepared statement
                                            mysqli_stmt_execute($stmt);

                                            // Get the result
                                            $result = mysqli_stmt_get_result($stmt);

                                            // Process the result as needed
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // Process each row

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

                                            // Close the statement
                                            mysqli_stmt_close($stmt);
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