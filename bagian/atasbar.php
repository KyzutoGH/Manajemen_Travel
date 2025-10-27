<header class="main-header">
	<a href="#" class="logo" style="background-color: magenta;">
		<span class="logo-lg"><img src="../dist/img/logovertikal.png" style="width: 73%;"></span>
		<span class="logo-mini"><img src="../dist/img/favikon.png" style="width: 32px; height: 32px;"></span>
	</a>
	<nav class="navbar navbar-static-top" style="background-color: cadetblue;">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php if ($_SESSION['role'] == 'pelanggan') { ?>
								<img src="../dist/img/e17747c78dd89a1d9522c5da154128b2.png" class="user-image" alt="User Image">
							<?php } else { ?>
								<img src="../dist/img/e17747c78dd89a1d9522c5da154128b2 879y98yh.png" class="user-image" alt="User Image">
							<?php } ?>
						<span class="hidden-xs"><?php echo ucwords($_SESSION['user']); ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<?php if ($_SESSION['role'] == 'pelanggan') { ?>
								<img src="../dist/img/e17747c78dd89a1d9522c5da154128b2.png" class="img-circle" alt="User Image">
							<?php } else { ?>
								<img src="../dist/img/e17747c78dd89a1d9522c5da154128b2 879y98yh.png" class="img-circle" alt="User Image">
							<?php } ?>
							<p><?php echo $_SESSION['user']; ?></p>
							<p><small><?php echo $_SESSION['role']; ?></small></p>
						</li>
						<li class="user-footer">
							<?php if ($_SESSION['role'] == 'pelanggan') {
							?>
								<div class="pull-left">
									<a href="index.php?submenu=Akun&IDPelanggan=<?php echo $_SESSION['idpelanggan']; ?>" class="btn btn-default btn-flat">Informasi Akun</a>
								</div>
							<?php
							} ?>
							<div class="pull-right">
								<a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>