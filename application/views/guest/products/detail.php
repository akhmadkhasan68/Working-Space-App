<div class="page-header header-filter page-header-small">
	<div class="page-header-image"
		style="background-image: url('<?php echo base_url()?>assets/guest/img/pages/photo-15.jpg');"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 mr-auto text-left">
				<h1 class="title text-white">Detail Co-Working Space</h1>
				<h4 class="category text-white opacity-8"><?= $place['name']?></h4>
			</div>
		</div>
	</div>
</div>

<div class="section section-item">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 ">
				<div id="productCarousel" class="carousel slide pointer-event" data-ride="carousel" data-interval="8000">
					<ol class="carousel-indicators mt-5">
						<?php foreach($place['photos'] as $k_photos => $v_photos):?>
							<li data-target="#productCarousel" data-slide-to="<?= $k_photos?>" class="<?php if($k_photos == 0):?>active<?php endif;?>"></li>
						<?php endforeach;?>
					</ol>
					<div class="carousel-inner" role="listbox">
						<?php foreach($place['photos'] as $k_photos => $v_photos):?>
							<div class="carousel-item <?php if($k_photos == 0):?>active<?php endif;?>">
								<img class="d-block img-responsive img-fluid" src="<?= base_url('uploads/photos')?>/<?= $v_photos['photo']?>" alt="First slide">
							</div>
						<?php endforeach;?>
					</div>
					<a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
						<button type="button" class="btn btn-warning btn-icon btn-round btn-sm" name="button">
							<i class="ni ni-bold-left"></i>
						</button>
					</a>
					<a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
						<button type="button" class="btn btn-warning btn-icon btn-round btn-sm" name="button">
							<i class="ni ni-bold-right"></i>
						</button>
					</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 mx-auto">
				<h2 class="title font-weight-bold"><?= $place['name']?></h2>
				<div class="stats">
					<div class="stars text-warning">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="far fa-star"></i>
						<p class="d-inline">(76 reviews)</p>
					</div>
				</div>


				<h2 class="main-price d-inline">Rp. <?= number_format($place['price'], 0, ',', '.')?></h2>
				<small class="text-muted d-inline">/Jam</small>

				<h6 class="category mt-3">Deskripsi</h6>
				<p class="description"><?= $place['description']?>
				</p>
				<br>
				<div class="row pick-size">
					<div class="col-lg-6 col-md-6">
						<label>Tanggal Reservasi</label>
						<input type="text" class="form-control" name="from_date" id="from_date" placeholder="Tanggal Reservasi Awal" value="<?php if(isset($_GET['from_date'])): echo base64_decode($_GET['from_date']); endif;?>">
					</div>
					<div class="col-lg-6 col-md-6">
						<label>Tanggal Reservasi</label>
						<input type="text" class="form-control" name="to_date" id="to_date" placeholder="Tanggal Reservasi Akhir" value="<?php if(isset($_GET['to_date'])): echo base64_decode($_GET['to_date']); endif;?>">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">

					</div>
				</div>
				<br>
				<div class="row justify-content-start">
					<button onclick="create_transaction(`<?php echo site_url('guest/transaction/create')?>/<?= $place['id']?>`)" class="btn btn-warning ml-3 btn-block">Reservasi &nbsp;<i class="fa fa-ticket"></i></button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="nav-wrapper">
					<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
								href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
								aria-selected="false"><i class="fa fa-building mr-2"></i>Fasilitas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
								href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
								aria-selected="false"><i class="fa fa-clock mr-2"></i>Jam Operasional</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
								href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
								aria-selected="true"><i class="fa fa-phone mr-2"></i>Kontak</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
								href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4"
								aria-selected="true"><i class="fa fa-credit-card mr-2"></i>Metode Pembayaran</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-5-tab" data-toggle="tab"
								href="#tabs-icons-text-5" role="tab" aria-controls="tabs-icons-text-5"
								aria-selected="true"><i class="fa fa-cutlery mr-2"></i>Menu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-6-tab" data-toggle="tab"
								href="#tabs-icons-text-6" role="tab" aria-controls="tabs-icons-text-6"
								aria-selected="true"><i class="fa fa-comments mr-2"></i>Review Pengguna</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-7-tab" data-toggle="tab"
								href="#tabs-icons-text-7" role="tab" aria-controls="tabs-icons-text-7"
								aria-selected="true"><i class="fa fa-map-marker mr-2"></i>Lokasi</a>
						</li>
					</ul>
				</div>
				<div class="card shadow">
					<div class="card-body">
						<div class="tab-content" id="myTabContent">
							<!-- fasilitas -->
							<div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel"
								aria-labelledby="tabs-icons-text-1-tab">
								<div class="row align-items-center justify-content-md-between">
									<div class="col-md-12">
										<div class="row">
											<?php foreach($place['facilities'] as $k_facility => $v_facility):?>
												<h5><span class="badge badge-success badge-pill ml-2 mt-2"><?= $v_facility['name']?></span></h5>
											<?php endforeach;?>
										</div>
									</div>
								</div>
							</div>
							<!-- fasilitas -->

							<div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
								aria-labelledby="tabs-icons-text-2-tab">
								<table class="table table-bordered">
									<tr>
										<th>Hari</th>
										<th>Pukul</th>
									</tr>
									<?php foreach($place['schedules'] as $k_schedule => $v_schedule):?>
										<tr>
											<td><strong><?= $k_schedule?></strong></td>
											<td>
												<?php if(!empty($v_schedule)):?>
													<?php if($v_schedule['open'] == $v_schedule['close']):?>
														<h5><span class="badge badge-primary"><i class="fa fa-clock"></i> 24 Jam</span></h5>
													<?php else:?>
														<?= date('h:i A', strtotime($v_schedule['open']))?> - <?= date('h:i A', strtotime($v_schedule['close']))?>
													<?php endif;?>
												<?php else:?>
													<h5><span class="badge badge-danger"><i class="fa fa-times-circle"></i> Tutup</span></h5>
												<?php endif;?>
											</td>
										</tr>
									<?php endforeach;?>
								</table>
							</div>
							<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
								aria-labelledby="tabs-icons-text-3-tab">
								<table class="table table-bordered">
									<?php foreach($place['contacts'] as $k_contact => $v_contact):?>
										<tr>
											<td><b><?= $k_contact?></b></td>
											<td><?= $v_contact['value']?></td>
										</tr>
									<?php endforeach;?>
								</table>
							</div>

							<div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
								aria-labelledby="tabs-icons-text-4-tab">
								<div class="row align-items-center justify-content-md-between">
									<div class="col-md-12">
										<div class="row">
											<?php foreach($place['payments'] as $k_payment => $v_payment):?>
												<h5><span class="badge badge-success badge-pill ml-2 mt-2"><?= $v_payment['value']?> (<?= $v_payment['name']?>)</span></h5>
											<?php endforeach;?>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="tabs-icons-text-5" role="tabpanel"
								aria-labelledby="tabs-icons-text-5-tab">
								<div class="col-md-12">
									<div class="row">
										<div class="col-lg-3 col-md-6">
											<!--
      										color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
      									-->
											<div class="nav-wrapper">
												<ul class="nav nav-pills nav-pills-warning nav-pills-icons flex-column"
													role="tablist">
													<li class="nav-item p-0">
														<a class="nav-link active" data-toggle="tab" href="#link110"
															role="tablist">
															Makanan
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#link111"
															role="tablist">
															Minuman
														</a>
													</li>
                                                    <li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#link112"
															role="tablist">
															Snack
														</a>
													</li>
                                                    <li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#link113"
															role="tablist">
															Lainnya
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="col-md-8">
											<div class="card card-plain">
												<div class="tab-content mt-2">
													<div class="tab-pane fade active show" id="link110">
														<div class="card shadow">
															<ul class="list-group list-group-flush">
																<?php foreach($place['menus']['food'] as $food):?>
																	<li class="list-group-item">
																		<div class="d-flex content-justify-between">
																			<span class="font-weight-bold"><?= $food['name']?></span> <span class="font-weight-bold ml-auto">Rp. <?= $food['price']?></span>
																		</div>
																	</li>
																<?php endforeach;?>
															</ul>
														</div>
													</div>
													<div class="tab-pane fade" id="link111">
														<div class="card shadow">
															<ul class="list-group list-group-flush">
																<?php foreach($place['menus']['baverage'] as $baverage):?>
																	<li class="list-group-item">
																		<div class="d-flex content-justify-between">
																			<span class="font-weight-bold"><?= $baverage['name']?></span> <span class="font-weight-bold ml-auto">Rp. <?= $baverage['price']?></span>
																		</div>
																	</li>
																<?php endforeach;?>
															</ul>
														</div>
													</div>
													<div class="tab-pane fade" id="link112">
														<div class="card shadow">
															<ul class="list-group list-group-flush">
																<?php foreach($place['menus']['snack'] as $snack):?>
																	<li class="list-group-item">
																		<div class="d-flex content-justify-between">
																			<span class="font-weight-bold"><?= $snack['name']?></span> <span class="font-weight-bold ml-auto">Rp. <?= $snack['price']?></span>
																		</div>
																	</li>
																<?php endforeach;?>
															</ul>
														</div>
													</div>
													<div class="tab-pane fade" id="link113">
														<div class="card shadow">
															<ul class="list-group list-group-flush">
																<?php foreach($place['menus']['other'] as $other):?>
																	<li class="list-group-item">
																		<div class="d-flex content-justify-between">
																			<span class="font-weight-bold"><?= $other['name']?></span> <span class="font-weight-bold ml-auto">Rp. <?= $other['price']?></span>
																		</div>
																	</li>
																<?php endforeach;?>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="tabs-icons-text-6" role="tabpanel"
								aria-labelledby="tabs-icons-text-6-tab">
								<div class="row">
									<div class="col-md-6">
										<span class="text-primary font-weight-bold">Khasan Abdullah</h4>
										<div class="stats">
											<div class="stars text-warning">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="far fa-star"></i>
											</div>
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<p>
										Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI. 
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<span class="text-primary font-weight-bold">Khasan Abdullah</h4>
										<div class="stats">
											<div class="stars text-warning">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="far fa-star"></i>
											</div>
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<p>
											Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI. 
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<span class="text-primary font-weight-bold">Khasan Abdullah</h4>
										<div class="stats">
											<div class="stars text-warning">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="far fa-star"></i>
											</div>
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<p>
											Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI. 
										</p>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="tabs-icons-text-7" role="tabpanel"
								aria-labelledby="tabs-icons-text-7-tab">

								<div class="row">
									<div class="col-md-5">
										<div id="map" style='height: 300px;-webkit-box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);-moz-box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);'></div>
									</div>
									<div class="col-md-7">
										<p>
											<?= $place['address']?>, <?= $place['district']?>, <?= $place['regency']?>, <?= $place['province']?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section related-products">
	<div class="container">
		<div class="col-md-8">
			<h2 class="title">Rekomendasi Lain yang Mungkin Anda Suka </h2>
		</div>
		<div class="row">
			<?php foreach($places as $k_place => $v_place):?>
				<div class="col-lg-4 col-md-6">
					<div class="card card-product shadow">
					<img class="card-img-top" src="<?= base_url('uploads/photos')?>/<?= $v_place['photos'][0]['photo']?>" alt="...">
						<div class="card-body">
							<h5 class="d-inline p-2card-title font-weight-bold"><?= $v_place['name']?></h5>

							<div class="d-flex justify-content-between mt-2">
                                <small class=" text-muted"><i class="fa fa-map-marker"></i> <?= $v_place['regency']?></small>
                                <small class=" text-muted"><i class="fa fa-money"></i> <?= $v_place['price']?>/Jam</small>
                                <small class=" text-muted"><i class="fa fa-users"></i> <?= $v_place['capacity']?></small>
                            </div>

							<div class="card-footer">
								<div class="d-flex justify-content-between mt-2">
									<a href="<?php echo site_url('guest/products/detail/')?><?= $v_place['id']?>" class="mr-3 btn btn-primary btn-block btn-sm">
                                        <i class="fa fa-info-circle"></i> Detail
                                    </a>
									<button class="btn <?= ($v_place['bookmark']) ? 'btn-danger' : 'btn-outline-danger'?> btn-block btn-sm" onclick="addBoomark(this, <?= $v_place['id']?>)">
                                        <i class="fa fa-bookmark-o"></i> Bookmark
                                    </button>
								</div>
							</div>
						</div>
					</div> <!-- end card -->
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
