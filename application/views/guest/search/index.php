<div class="page-header header-filter ">
	<!-- <div class="page-header-image" style="background-image: url('https://source.unsplash.com/random/500x500');"></div> -->
	<div class="page-header-image" style="background-image: url('https://source.unsplash.com/random/800x600');"></div>
	<div class="container pt-0">
		<div class="row">
			<div class="col-lg-6 col-md-7 mx-auto text-center">
				<h1 class="title text-white font-weight-bold">Cari Co-Working Berdasarkan Jadwal Reservasi yang Anda Tentukan</h1>
			</div>
		</div>
	</div>
</div>
<div class="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-12">
				<div class="form-group">
					<div class="input-group input-group-alternative mb-4">
						<input type="text" class="form-control form-control-lg shadow" name="start_date" id="start_date" style="border-radius: 30px;"
							placeholder="Tanggal Awal">
					</div>
				</div>
			</div>
            <div class="col-lg-5 col-md-5 col-12">
				<div class="form-group">
					<div class="input-group input-group-alternative mb-4">
						<input type="text" class="form-control form-control-lg shadow" name="end_date" id="end_date" style="border-radius: 30px;"
							placeholder="Tanggal Akhir">
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-10 col-12">
				<button class="btn btn-warning shadow btn-lg btn-block" style="border-radius: 30px;"><i
						class="fa fa-search"></i></button>
			</div>

			<div class="col-lg-4 col-md-6">
				<a href="<?php echo site_url('guest/products/detail/1')?>">
					<div class="card card-product shadow">
						<img class="card-img-top" src="https://source.unsplash.com/random/500x500" alt="...">
						<div class="card-body">
							<h5 class="d-inline p-2card-title font-weight-bold">7 Chiken</h5>
							<span class="d-inline p-2 pull-right badge badge-success">NEW</span>

							<div class="d-flex justify-content-between mt-2">
								<small class=" text-muted"><i class="fa fa-map-marker"></i> Malang</small>
								<small class=" text-muted"><i class="fa fa-money"></i> 20k/Jam</small>
								<small class=" text-muted"><i class="fa fa-tag"></i> Umum</small>
							</div>

							<div class="card-footer">
								<button class="btn btn-outline-danger btn-block btn-sm ">
									<i class="fa fa-bookmark-o"></i> Bookmark
								</button>
							</div>
						</div>
					</div> <!-- end card -->
				</a>
			</div>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo site_url('guest/products/detail/1')?>">
					<div class="card card-product shadow">
						<img class="card-img-top" src="https://source.unsplash.com/random/500x500" alt="...">
						<div class="card-body">
							<h5 class="d-inline p-2card-title font-weight-bold">7 Chiken</h5>
							<span class="d-inline p-2 pull-right badge badge-success">NEW</span>

							<div class="d-flex justify-content-between mt-2">
								<small class=" text-muted"><i class="fa fa-map-marker"></i> Malang</small>
								<small class=" text-muted"><i class="fa fa-money"></i> 20k/Jam</small>
								<small class=" text-muted"><i class="fa fa-tag"></i> Umum</small>
							</div>

							<div class="card-footer">
								<button class="btn btn-outline-danger btn-block btn-sm ">
									<i class="fa fa-bookmark-o"></i> Bookmark
								</button>
							</div>
						</div>
					</div> <!-- end card -->
				</a>
			</div>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo site_url('guest/products/detail/1')?>">
					<div class="card card-product shadow">
						<img class="card-img-top" src="https://source.unsplash.com/random/500x500" alt="...">
						<div class="card-body">
							<h5 class="d-inline p-2card-title font-weight-bold">7 Chiken</h5>
							<span class="d-inline p-2 pull-right badge badge-success">NEW</span>

							<div class="d-flex justify-content-between mt-2">
								<small class=" text-muted"><i class="fa fa-map-marker"></i> Malang</small>
								<small class=" text-muted"><i class="fa fa-money"></i> 20k/Jam</small>
								<small class=" text-muted"><i class="fa fa-tag"></i> Umum</small>
							</div>

							<div class="card-footer">
								<button class="btn btn-outline-danger btn-block btn-sm ">
									<i class="fa fa-bookmark-o"></i> Bookmark
								</button>
							</div>
						</div>
					</div> <!-- end card -->
				</a>
			</div>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-10 mx-auto text-center">
					<h3 class="desc"> Hasil Serupa Lainnya</h3>
                    <p class="lead mt-1">Hasil serupa dari kata kunci anda. </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
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
		</div>
	</div><!-- section -->

</div>
