<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENU</li>
			<li class="treeview <?php if ($menu == "Perjalanan") {
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
									echo isset($subzero) && $subzero == "Armada" ? '..' : '.';
									?>/armada.php">
							<i class="fa fa-bus text-aqua"></i> Data Armada
						</a>
					</li>
					<li class="<?php if ($submenu == "Jadwal") {
									echo "active";
								} ?>">
						<a href="<?php
									$subzero = isset($_GET['subzero']) ? $_GET['subzero'] : '';
									echo isset($subzero) && $subzero == "Jadwal" ? '..' : '.';
									?>/index.php">
							<i class="fa fa-table text-red"></i> Data Jadwal
						</a>
					</li>
				</ul>
				<ul class="treeview-menu">
					<li></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>