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
						<a href="tambahbuku.php" class="btn btn-primary" role="button"><b>+</b> Tambah Jadwal</a>
					</div>
					<div class="box-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Armada</th>
									<th>Tipe</th>
									<th>Asal</th>
									<th>Tujuan</th>
									<th>Jam Berangkat</th>
									<th>Jam Tiba</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
									$no = 1;
									$data = mysqli_query($koneksi, "select * from transaksi");
									while ($d = mysqli_fetch_array($data)) {
									?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $d['kode_buku']; ?></td>
									<td><?php echo $d['judul_buku']; ?></td>
									<td><?php echo $d['jenis']; ?></td>
									<td><?php echo $d['pengarang']; ?></td>
									<td><?php echo $d['penerbit']; ?></td>
									<td><?php echo $d['tahun']; ?></td>
									<td>
										<a class="col-xs-offset-1 btn btn-success glyphicon glyphicon-pencil" href="editbuku.php?id_buku=<?php echo $d['id_buku']; ?>"></a>
										<a class="btn btn-danger glyphicon glyphicon-trash" href="hapus.php?id_buku=<?php echo $d['id_buku']; ?>"></a>
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