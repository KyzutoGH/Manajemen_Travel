<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENU</li>
			<li class="treeview <?php if ($submenu == "Armada" || $submenu == "Jadwal") {
									echo "active";
								} ?>">
				<a href="#">
					<i class="fa fa-table" style="color: skyblue;"></i><span>Perjalanan</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if ($submenu == "Armada") {
									echo "active";
								} ?>">
						<a href="<?php
									$subzero = isset($_GET['subzero']) ? $_GET['subzero'] : '';
									echo isset($subzero) && $subzero == "Armada" || $subzero == "Jadwal" ? '..' : '.';
									?>/index.php?submenu=Armada">
							<i class="fa fa-bus text-aqua"></i> Data Armada
						</a>
					</li>
					<li class="<?php if ($submenu == "Jadwal") {
									echo "active";
								} ?>">
						<a href="<?php
									$subzero = isset($_GET['subzero']) ? $_GET['subzero'] : '';
									echo isset($subzero) && $subzero == "Jadwal" || $subzero == "Armada" ? '..' : '.';
									?>/index.php?submenu=Jadwal">
							<i class="fa fa-table text-red"></i> Data Jadwal
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php if ($submenu == "Pelanggan" || $submenu == "Penumpang") {
									echo "active";
								} ?>">
				<a href="#">
					<i class="fa fa-user" style="color: skyblue;"></i><span>Pelanggan</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if ($submenu == "Pelanggan") {
									echo "active";
								} ?>">
						<a href="<?php
									$subzero = isset($_GET['subzero']) ? $_GET['subzero'] : '';
									echo isset($subzero) && $subzero == "Pelanggan" ? '..' : '.';
									?>/index.php?submenu=Pelanggan">
							<i class="fa fa-bus text-aqua"></i> Data Pelanggan
						</a>
					</li>
					<li class="<?php if ($submenu == "Penumpang") {
									echo "active";
								} ?>">
						<a href="<?php
									$subzero = isset($_GET['subzero']) ? $_GET['subzero'] : '';
									echo isset($subzero) && $subzero == "Penumpang" ? '..' : '.';
									?>/index.php?submenu=Penumpang">
							<i class="fa fa-table text-red"></i> Data Penumpang
						</a>
					</li>
				</ul>
			<li class="<?php if ($submenu == "Transaksi") {
							echo "active";
						} ?>">
				<a href="<?php
							$subzero = isset($_GET['subzero']) ? $_GET['subzero'] : '';
							echo isset($subzero) && $subzero == "Transaksi" ? '..' : '.';
							?>/index.php?submenu=Transaksi">
					<i class="fa fa-money text-green"></i>Transaksi
				</a>
			</li><li class="<?php if ($submenu == "Laporan") {
							echo "active";
						} ?>">
				<a href="<?php
							$subzero = isset($_GET['subzero']) ? $_GET['subzero'] : '';
							echo isset($subzero) && $subzero == "Laporan" ? '..' : '.';
							?>/index.php?submenu=Laporan&tanggal=<?php echo date('Y-m-d'); ?>">
					<i class="fa fa-print text-yellow"></i>Laporan
				</a>
			</li>
			</li>
		</ul>
	</section>
</aside>