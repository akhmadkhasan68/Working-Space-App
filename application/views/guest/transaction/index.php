<div class="page-header header-filter page-header-small">
	<div class="page-header-image"
		style="background-image: url('<?php echo base_url()?>assets/guest/img/pages/photo-15.jpg');"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 mr-auto text-left">
				<h1 class="title text-white">Transaksi Co-Working Space</h1>
				<h4 class="category text-white opacity-8">Halaman transaksi reservasi</h4>
			</div>
		</div>
	</div>
</div>

<div class="section section-item">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="font-weight-bold">Proses Transaksi</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-3">
								<div id="productCarousel" class="carousel slide pointer-event" data-ride="carousel"
									data-interval="8000">
									<ol class="carousel-indicators mt-5">
										<li data-target="#productCarousel" data-slide-to="0" class=""></li>
										<li data-target="#productCarousel" data-slide-to="1" class=""></li>
										<li data-target="#productCarousel" data-slide-to="2" class="active"></li>
									</ol>
									<div class="carousel-inner" role="listbox">
										<div class="carousel-item">
											<img class="d-block img-responsive img-fluid"
												src="<?php echo base_url()?>assets/guest/img/pages/shirt.png"
												alt="First slide">
										</div>
										<div class="carousel-item">
											<img class="d-block img-responsive img-fluid"
												src="<?php echo base_url()?>assets/guest/img/pages/shorts.png"
												alt="Second slide">
										</div>
										<div class="carousel-item active">
											<img class="d-block img-responsive img-fluid"
												src="<?php echo base_url()?>assets/guest/img/pages/tshirt.png"
												alt="Third slide">
										</div>
									</div>
									<a class="carousel-control-prev" href="#productCarousel" role="button"
										data-slide="prev">
										<button type="button" class="btn btn-warning btn-icon btn-round btn-sm"
											name="button">
											<i class="ni ni-bold-left"></i>
										</button>
									</a>
									<a class="carousel-control-next" href="#productCarousel" role="button"
										data-slide="next">
										<button type="button" class="btn btn-warning btn-icon btn-round btn-sm"
											name="button">
											<i class="ni ni-bold-right"></i>
										</button>
									</a>
								</div>
							</div>
							<div class="col-md-9">
								<h2 class="title font-weight-bold text-warning">7 Chiken Co-Working Space</h2>
								<div class="row">
									<div class="col-md-12">
										<small class="mt-0 font-weight-bold text-bold">Tanggal Transaksi Dibuat:</small>
										<small class="pull-right text-muted mt-0 text-capitalize" id="order-date">18
											Juni
											2021 08:00:00</small>
									</div>
								</div>

								<div class="row mt-3">
									<div class="col-md-12 col-12">
										<h5 class="h5 card-title mb-0">Ringkasan Pemesanan</h5>
										<div class="table-responsive">
											<table class="table table-bordered mt-3">
												<thead>
													<tr>
														<th width=5px>#</th>
														<th>Harga</th>
														<th>Waktu Sewa</th>
														<th>Subtotal</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td><span class="text-capitalize">Rp. 20.000/Jam</span>
														</td>
														<td>
															18 Juni 2021 08:00 Sampai 18 Juni 2021 15:00
															<br>
															<span class="badge badge-primary">7 Jam x Rp.20.000</span>
														</td>
														<td class="font-weight-bold">Rp. 140.000</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="row mt-2">
									<div class="col-md-6">
										<h5 class="h5 mb-0 text-muted">Total</h5>
									</div>
									<div class="col-md-6 text-right">
										<h5 class="h5 mb-0 text-warning">Rp. 90.000</h5>
									</div>
								</div>

							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<div class="alert alert-info" role="alert">
									<h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Info!</h4> 
									Transaksi anda belum dibayar. Silahkan melakukan proses pembayaran dan <br> upload bukti pembayaran melalui tombol dibawah ini. 
									<br>
									<br>
									<a href="">Klik disini</a> untuk melihat cara pembayaran transaksi.
								</div>

							</div>
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-success">Upload Bukti Pembayaran</button>
						<button class="btn btn-danger">Batalkan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
