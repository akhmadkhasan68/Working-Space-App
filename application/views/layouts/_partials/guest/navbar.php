<body class="ecommerce-page">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-absolute bg-white shadow">
		<div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand" href="<?php echo site_url('/')?>">Co-Working Apps</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-header-6"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="example-header-6">
				<div class="navbar-collapse-header">
					<div class="row">
						<div class="col-6 collapse-brand">
							<a>
								PAGES <span> TITLE </span>
							</a>
						</div>
						<div class="col-6 collapse-close text-right">
							<button type="button" class="navbar-toggler" data-toggle="collapse"
								data-target="#example-header-6" aria-controls="navigation-index" aria-expanded="false"
								aria-label="Toggle navigation">
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</div>
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('')?>">
							Beranda
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('guest/products')?>">
							Co-Working Space
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('guest/search')?>">
							Cari Jadwal
						</a>
					</li>
				</ul>

				<?php if ($this->session->userdata('is_login')):?>
					<ul class="navbar-nav ml-lg-auto">
						<?php if($this->session->userdata('role') == "owner"):?>
						<li class="nav-item">
							<a class="nav-link nav-link-icon" href="<?= site_url('owner/myworkingspace')?>"><i class="fa fa-home"></i> Kelola Co-Working Anda</a>
						</li>
						<?php endif; ?>
							
						<li class="nav-item dropdown">
							<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-user"></i>
								<?= $this->session->userdata('name') ?>
								<!-- <span class="nav-link-inner--text d-lg-none">Pengguna</span> -->
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
								<a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profil</a>
								<?php if ($this->session->userdata('role') == 'guest'):?>
									<a class="dropdown-item" href="<?= site_url('guest/transaction/history')?>"><i class="fa fa-history"></i> Riwayat Transaksi</a>
									<a class="dropdown-item" href="<?= site_url('guest/bookmarks')?>"><i class="fa fa-bookmark"></i> Bookmarks</a>
								<?php endif;?>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" onclick="logout()"><i class="fa fa-power-off"></i> Keluar</a>
							</div>
						</li>
					</ul>
				<?php else:?>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item">
							<a href="<?php echo site_url('auth/login')?>" class="btn btn-white">
								<i class="ni ni-laptop d-lg-none"></i>
								<span class="nav-link-inner--text">Masuk</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('auth/register_guest')?>" class="btn btn-primary">
								<i class="ni ni-laptop d-lg-none"></i>
								<span class="nav-link-inner--text">Daftar</span>
							</a>
						</li>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
