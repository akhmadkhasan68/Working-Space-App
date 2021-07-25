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
					<a class="nav-link" data-toggle="pill" href="#" onclick="renderPage(`<?= site_url('owner/myworkingspace/render/reservation') ?>`)"><i class="fa fa-ticket"></i> Reservasi <?php if(count($reservations_waiting) > 0):?><span class="badge badge-success"><?= count($reservations_waiting)?></span><?php endif;?></a>
				</div>
			</div>
			<div class="col-md-9" id="page-content">
				
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="add-menu-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="add-menu-form">
				
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-detail-reservation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Reservasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="body-detail-reservation">
				
			</div>
		</div>
	</div>
</div>