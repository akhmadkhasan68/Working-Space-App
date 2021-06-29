<?php
    $controller = $this->uri->segment(2);
?>
<body>
	<!-- Sidenav -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header d-flex align-items-center">
				<a class="navbar-brand" href="dashboard.html">
					<img src="<?= base_url()?>assets/admin/img/brand/blue.png" class="navbar-brand-img" alt="...">
				</a>
				<div class="ml-auto">
					<!-- Sidenav toggler -->
					<div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
						data-target="#sidenav-main">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="navbar-inner">
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!-- Nav items -->
					<ul class="navbar-nav">
                        <li class="nav-item">
							<a class="nav-link <?= ($controller == 'dashboard') ? 'active' : ''?>" href="<?= site_url('admin/dashboard')?>">
								<i class="fa fa-home text-green"></i>
								<span class="nav-link-text">Dashboards</span>
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link <?= ($controller == 'facilities' || $controller == 'payments') ? 'active' : ''?>" href="#navbar-examples" data-toggle="collapse" role="button"
								aria-expanded="<?= ($controller == 'facilities' || $controller == 'payments') ? 'true' : 'false'?>" aria-controls="navbar-examples">
								<i class="fa fa-database text-primary"></i>
								<span class="nav-link-text">Master Data</span>
							</a>
							<div class="collapse <?= ($controller == 'facilities' || $controller == 'payments') ? 'show' : ''?>" id="navbar-examples">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="<?= site_url('admin/facilities')?>" class="nav-link <?= ($controller == 'facilities') ? 'active' : ''?>">Master Fasilitas</a>
									</li>
									<li class="nav-item">
										<a href="<?= site_url('admin/payments')?>" class="nav-link <?= ($controller == 'payments') ? 'active' : ''?>">Master Payment</a>
									</li>
								</ul>
							</div>
						</li>

                        <li class="nav-item">
							<a class="nav-link <?= ($controller == 'users') ? 'active' : ''?>" href="<?= site_url('admin/users')?>">
								<i class="fa fa-users text-info"></i>
								<span class="nav-link-text">Data Pengguna</span>
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link <?= ($controller == 'places') ? 'active' : ''?>" href="<?= site_url('admin/places')?>">
								<i class="fa fa-building text-warning"></i>
								<span class="nav-link-text">Data Co-Working</span>
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link <?= ($controller == 'reservations') ? 'active' : ''?>" href="<?= site_url('admin/reservations')?>">
								<i class="fa fa-ticket text-success"></i>
								<span class="nav-link-text">Data Reservasi</span>
							</a>
						</li>

                        <li class="nav-item">
							<a class="nav-link" href="#" onclick="logout()">
								<i class="fa fa-power-off text-danger"></i>
								<span class="nav-link-text">Keluar</span>
							</a>
						</li>
					</ul>	
				</div>
			</div>
		</div>
	</nav>

	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav align-items-center ml-md-auto">
						<li class="nav-item d-xl-none">
							<!-- Sidenav toggler -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
								data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<li class="nav-item d-sm-none">
							<a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
								<i class="ni ni-zoom-split-in"></i>
							</a>
						</li>
					</ul>
					<ul class="navbar-nav align-items-center ml-auto ml-md-0">
						<li class="nav-item dropdown">
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
										<img alt="Image placeholder" src="<?= base_url()?>assets/admin/img/theme/team-4.jpg">
									</span>
									<div class="media-body ml-2 d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold"><?= $this->session->userdata('username')?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="dropdown-header noti-title">
									<h6 class="text-overflow m-0">Welcome!</h6>
								</div>
								<!-- <a href="#!" class="dropdown-item">
									<i class="ni ni-single-02"></i>
									<span>My profile</span>
								</a>
								<a href="#!" class="dropdown-item">
									<i class="ni ni-settings-gear-65"></i>
									<span>Settings</span>
								</a>
								<a href="#!" class="dropdown-item">
									<i class="ni ni-calendar-grid-58"></i>
									<span>Activity</span>
								</a>
								<a href="#!" class="dropdown-item">
									<i class="ni ni-support-16"></i>
									<span>Support</span>
								</a> -->
								<div class="dropdown-divider"></div>
								<a href="#!" class="dropdown-item" onclick="logout()">
									<i class="ni ni-user-run"></i>
									<span>Keluar</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Header -->
