<header class="main-header">
	<a href="#" class="logo">
		<span class="logo-lg">Aplikasi Travel Gatel</span>
	</a>
	<nav class="navbar navbar-static-top">
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
							<p><small>Admin</small></p>
						</li>
						<li class="user-footer">
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