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
									$no = 1;
									$data = mysqli_query($koneksi, "SELECT armada.NamaArmada, armada.Jenis, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada;");
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
									<td><?php echo $d['TanggalBerangkat']; ?></td>
									<td><?php echo $d['JamBerangkat']; ?></td>
									<td><?php echo $d['JamTiba']; ?></td>
									<td><?php echo $d['Harga']; ?></td>
									<td>
										<a class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="editbuku.php?id_buku=<?php echo $d['IDJadwal']; ?>"></a>
										<a class="btn btn-danger glyphicon glyphicon-trash" href="hapus.php?id_buku=<?php echo $d['IDJadwal']; ?>"></a>
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