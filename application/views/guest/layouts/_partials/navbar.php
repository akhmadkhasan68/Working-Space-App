<body class="ecommerce-page">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-absolute bg-white shadow">
		<div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand" href="<?php echo site_url('/')?>">PAGES TITLE</a>
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
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item">
						<a href="<?php echo site_url('guest/auth/login')?>" class="btn btn-white">
							<i class="ni ni-laptop d-lg-none"></i>
							<span class="nav-link-inner--text">Masuk</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('guest/auth/register_guest')?>" class="btn btn-primary">
							<i class="ni ni-laptop d-lg-none"></i>
							<span class="nav-link-inner--text">Daftar</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->
