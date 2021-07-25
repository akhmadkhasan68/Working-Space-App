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
							<div class="col-md-9">
								<h2 class="title font-weight-bold text-warning"><?= $place['name']?></h2>
								<div class="row">
									<div class="col-md-12">
										<small class="mt-0 font-weight-bold text-bold">Tanggal Transaksi Dibuat:</small>
										<small class="pull-right text-muted mt-0 text-capitalize" id="order-date"><?= formattimestamp($reservation['created_at'])?></small>
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
														<td><span class="text-capitalize">Rp. <?= number_format($place['price'], 0, '.', '.')?>/Jam</span>
														</td>
														<td>
															<?= formattimestamp($reservation['from_date'])?> Sampai <?= formattimestamp($reservation['to_date'])?>
															<br>
															<span class="badge badge-primary"><?= $reservation['hours']?> Jam x Rp. <?= number_format($place['price'], 0, '.', '.')?></span>
														</td>
														<td class="font-weight-bold">Rp. <?= number_format($reservation['total'], 0, '.', '.')?></td>
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
										<h5 class="h5 mb-0 text-warning">Rp. <?= number_format($reservation['total'], 0, '.', '.')?></h5>
									</div>
								</div>

							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-12">
								<?php if($reservation['status'] == 0):?>
									<?php if($reservation['status_payment'] == "fund"):?>
										<div class="alert alert-warning">
											<h5 class="font-weight-bold text-white">Mohon Tunggu...</h5>
											<p>
												Mohon tunggu proses transaksi anda sedang di proses.
											</p>
										</div>
									<?php elseif($reservation['status_payment'] == null):?>
										<div class="alert alert-info" role="alert">
											<h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Info!</h4> 
											Transaksi anda belum dibayar. Silahkan melakukan proses pembayaran dan <br> upload bukti pembayaran melalui tombol dibawah ini. 
											<br>
											<br>
											<a href="#" data-toggle="modal" data-target="#modal-info-paymets">Klik disini</a> untuk melihat metode pembayaran yang tersedia.
										</div>
									<?php endif;?>
								<?php elseif($reservation['status'] == 1):?>
									<div class="alert alert-success" role="alert">
										<h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Terimakasih!</h4> 
										Proses reservasi dan transaksi anda sudah berhasil. Terimakasih telah menggunakan jasa kami :)
									</div>
								<?php elseif($reservation['status'] == 2):?>
									<?php if($reservation['status_payment'] == "refund"):?>
										<div class="alert alert-danger" role="alert">
											<h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Mohon Maaf!</h4> 
											Proses reservasi dan transaksi anda telah digagalkan oleh pihak Co-Working Space karena beberapa alasan. <br> Silahkan pilih tempat lain atau reserfasi dengan tanggal yang berbeda.
										</div>
									<?php elseif($reservation['status_payment'] == null):?>
										<div class="alert alert-warning" role="alert">
											<h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Mohon Maaf!</h4> 
											Proses reservasi dan transaksi telah dibatalkan.
										</div>
									<?php endif;?>
								<?php endif;?>
							</div>
						</div>
						
						<?php if($reservation['status_payment'] == null && $reservation['status'] != 2):?>
							<button class="btn btn-success" data-toggle="modal" data-target="#modal-form-upload">Unggah Bukti Pembayaran</button>
						<?php endif;?>

						<?php if($reservation['status'] != 1 && $reservation['status'] != 2):?>
							<button class="btn btn-danger" onclick="rejectTransaction(<?= $reservation['id']?>)">Batalkan</button>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-info-paymets" tabindex="-1" role="dialog" aria-labelledby="modal-info-paymets" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h6 class="modal-title" id="modal-title-default">Metode Pembayaran Yang Tersedia</h6>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<?php foreach($payments as $k_payment => $v_payment):?>
					<h5><span class="badge badge-success badge-pill ml-2 mt-2"><?= $v_payment['value']?> (<?= $v_payment['name']?>)</span></h5>
				<?php endforeach;?>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-form-upload" tabindex="-1" role="dialog" aria-labelledby="modal-form-upload" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Upload Bukti Pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="my-form">
				<input type="hidden" name="reservation_id" value="<?= $reservation['id']?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Penanggung Jawab</label>
						<div class="input-group input-group-alternative mb-4">
						<input class="form-control" placeholder="Masukkan Nama Penanggung Jawab ..." type="text" name="name">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						</div>
					</div>

					<div class="form-group">
						<label for="">Alamat Penanggung Jawab</label>
						<div class="input-group input-group-alternative mb-4">
							<textarea class="form-control form-control-alternative" rows="3" placeholder="Masukkan Alamat Penanggung Jawab ..." name="address"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="">Nomor Telepon Penanggung Jawab</label>
						<div class="input-group input-group-alternative mb-4">
						<input class="form-control" placeholder="Masukkan Nomor Telepon Penanggung Jawab ..." type="number" name="phone">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fa fa-phone"></i></span>
						</div>
						</div>
					</div>

					<div class="form-group">
						<label for="">Asal Instansi</label>
						<div class="input-group input-group-alternative mb-4">
							<select name="type" id="type" class="form-control form-control-alternative">
								<option value="">Pilih Instansi</option>
								<option value="community">Komunitas</option>
								<option value="workers">Pekerja</option>
								<option value="students">Pelajar</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="">Metode Pembayaran</label>
						<div class="input-group input-group-alternative mb-4">
							<select name="payment_id" id="payment_id" class="form-control form-control-alternative">
								<option value="">Pilih Metode Pembayaran</option>
								<?php foreach($payments as $k_payment => $v_payment):?>
									<option value="<?= $v_payment['id']?>"><?= $v_payment['name']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="">Nominal Pembayaran</label>
						<div class="input-group input-group-alternative mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text">Rp.</span>
							</div>
							<input class="form-control" placeholder="Masukkan Nominal Pembayaran ..." type="number" name="total_payment">
						</div>
					</div>

					<div class="form-group">
						<label for="">Unggah Bukti</label>
						<div class="input-group input-group-alternative mb-4">
							<input class="form-control" name="photos" type="file" id="fileUpload">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Kirim</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</form>	
		</div>
	</div>
</div>