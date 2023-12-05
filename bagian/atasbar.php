<header class="main-header">
	<a href="#" class="logo" style="background-color: #A5D7E8 ;">
		<span class="logo-lg"><img src="../dist/img/logovertikal.png" style="width: 190px; height: 45px;"></span>
		<span class="logo-mini"><img src="../dist/img/favikon.png" style="width: 32px; height: 32px;"></span>
	</a>
	<nav class="navbar navbar-static-top" style="background-color: #576CBC;">
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
						<img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo ucwords($_SESSION['user']); ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
							<p><?php echo $_SESSION['user']; ?></p>
							<p><small><?php echo $_SESSION['role'];?></small></p>
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