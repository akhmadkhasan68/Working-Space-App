<div class="page-header header-filter page-header-small">
	<div class="page-header-image"
		style="background-image: url('<?php echo base_url()?>assets/guest/img/pages/photo-15.jpg');"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 mr-auto text-left">
				<h1 class="title text-white">Kelola Co-Working Space Anda</h1>
				<h4 class="category text-white opacity-8">Buat Jangkauan Co-Working Anda Semakin Luas</h4>
			</div>
		</div>
	</div>
</div>

<div class="section section-item">
	<div class="" style="padding:0px 50px 0px 50px;">
		<div class="row">
			<div class="col-md-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/home') ?>`)"><i class="fa fa-home"></i> Home</a>
					<a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/general') ?>`)"><i class="fa fa-home"></i> Informasi Umum</a>
					<a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/payment') ?>`)"><i class="fa fa-credit-card"></i> Pembayaran</a>
					<a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/facilities') ?>`)"><i class="fa fa-building"></i> Fasilitas</a>
                    <a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/operational') ?>`)"><i class="fa fa-clock-o"></i> Jam Operasional</a>
					<a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/contact') ?>`)"><i class="fa fa-phone"></i> Kontak</a>
					<a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/menu') ?>`)"><i class="fa fa-cutlery"></i> Menu</a>
					<a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/review') ?>`)"><i class="fa fa-comment"></i> Lihat Review</a>
					<a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/reservation') ?>`)"><i class="fa fa-ticket"></i> Reservasi <span class="badge badge-success">5</span></a>
				</div>
			</div>
			<div class="col-md-9" id="page-content">
				
			</div>
		</div>
	</div>
</div>
