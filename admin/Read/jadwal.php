<div class="content-wrapper">
	<section class="content-header">
		<h1>Jadwal Perjalanan</h1>
		<ol class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
			<li class="active">Jadwal</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<a href="Create/tambah.php?subzero=Jadwal" class="btn btn-primary" role="button"><b>+</b> Tambah Jadwal</a>
					</div>
					<div class="box-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Armada</th>
									<th>Asal</th>
									<th>Tujuan</th>
									<th>Kelas</th>
									<th>Tanggal Berangkat</th>
									<th>Jam Berangkat</th>
									<th>Jam Tiba</th>
									<th>Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
									setlocale(LC_TIME, 'id_ID');
									$no = 1;
									$idtrx = isset($_GET['idjadwal']) ? $_GET['idjadwal'] : '';

									if ($idtrx != '') {
										$data = mysqli_query($koneksi, "SELECT armada.NamaArmada, armada.Jenis, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada WHERE IDJadwal = '$idtrx';");
									} else {
										$data = mysqli_query($koneksi, "SELECT armada.NamaArmada, armada.Jenis, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada;");
									}
									while ($d = mysqli_fetch_array($data)) {
									?>
								<tr>
									<td><?php echo $no++; ?></td>
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
									<td><?php echo $d['JamBerangkat']; ?></td>
									<td><?php echo $d['JamTiba']; ?></td>
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
										<select class="form-control" onchange="performAction(this.value, <?php echo $d['IDJadwal']; ?>)">
											<option selected>Aksi</option>
											<option value="edit">Edit</option>
											<option value="hapus">Hapus</option>
										</select>
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
<script>
	function performAction(action, id) {
		if (action === 'edit') {
			window.location.href = 'update/update.php?subzero=<?php echo $submenu; ?>&idjadwal=' + id;

		} else if (action === 'hapus') {
			window.location.href = 'delete/hapus.php?subzero=<?php echo $submenu; ?>&idjadwal=' + id;
		}
	}
</script>