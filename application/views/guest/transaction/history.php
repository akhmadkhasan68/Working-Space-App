<div class="page-header header-filter page-header-small">
	<div class="page-header-image"
		style="background-image: url('<?php echo base_url()?>assets/guest/img/pages/photo-15.jpg');"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 mr-auto text-left">
				<h1 class="title text-white"><i class="fa fa-history"></i> History Transaksi Co-Working Space</h1>
				<h4 class="category text-white opacity-8">Halaman history transaksi reservasi anda</h4>
			</div>
		</div>
	</div>
</div>

<div class="section section-item">
	<div class="container">
        <?php foreach($reservations as $k_reservation => $v_reservation):?>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header toggle-card" data-target="#card-body-<?= $v_reservation['id']?>" style="cursor:pointer;">
                            <div class="d-flex justify-content-between">
                                <h4 class="title font-weight-bold text-warning "><?= strtoupper($v_reservation['code'])?></h4>
                                <i class="fa fa-chevron-right mt-2"></i>
                            </div>
                        </div>
                        <div class="card-body" style="display:none;" id="card-body-<?= $v_reservation['id']?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small class="mt-0 font-weight-bold text-bold">Tanggal Transaksi Dibuat:</small>
                                            <small class="pull-right text-muted mt-0 text-capitalize" id="order-date"><?= formattimestamp($v_reservation['created_at'])?></small>
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
                                                            <td><span class="text-capitalize">Rp. <?= number_format($v_reservation['price'], 0, '.', '.')?>/Jam</span>
                                                            </td>
                                                            <td>
                                                                <?= formattimestamp($v_reservation['from_date'])?> Sampai <?= formattimestamp($v_reservation['to_date'])?>
                                                                <br>
                                                                <span class="badge badge-primary"><?= $v_reservation['hours']?> Jam x Rp. <?= number_format($v_reservation['price'], 0, '.', '.')?></span>
                                                            </td>
                                                            <td class="font-weight-bold">Rp. <?= number_format($v_reservation['total'], 0, '.', '.')?></td>
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
                                            <h5 class="h5 mb-0 text-warning">Rp. <?= number_format($v_reservation['total'], 0, '.', '.')?></h5>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <?php if($v_reservation['status'] == 0):?>
                                        <?php if($v_reservation['status_payment'] == "fund"):?>
                                            <div class="alert alert-warning">
                                                <h5 class="font-weight-bold text-white">Mohon Tunggu...</h5>
                                                <p>
                                                    Mohon tunggu proses transaksi anda sedang di proses.
                                                </p>
                                            </div>
                                        <?php elseif($v_reservation['status_payment'] == null):?>
                                            <div class="alert alert-info" role="alert">
                                                <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Info!</h4> 
                                                Transaksi anda belum dibayar. Silahkan melakukan proses pembayaran dan <br> upload bukti pembayaran melalui tombol dibawah ini. 
                                            </div>
                                        <?php endif;?>
                                    <?php elseif($v_reservation['status'] == 1):?>
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Terimakasih!</h4> 
                                            Proses reservasi dan transaksi anda sudah berhasil. Terimakasih telah menggunakan jasa kami :)
                                        </div>
                                    <?php elseif($v_reservation['status'] == 2):?>
                                        <?php if($v_reservation['status_payment'] == "refund"):?>
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Mohon Maaf!</h4> 
                                                Proses reservasi dan transaksi anda telah digagalkan oleh pihak Co-Working Space karena beberapa alasan. <br> Silahkan pilih tempat lain atau reserfasi dengan tanggal yang berbeda.
                                            </div>
                                        <?php elseif($v_reservation['status_payment'] == null):?>
                                            <div class="alert alert-warning" role="alert">
                                                <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Mohon Maaf!</h4> 
                                                Proses reservasi dan transaksi telah anda batalkan.
                                            </div>
                                        <?php endif;?>
                                    <?php endif;?>
                                </div>
                            </div>

                            <button onclick="detail(<?= $v_reservation['id']?>)" class="btn btn-info btn-icon btn-round mt-3"><span class="fa fa-info-circle" style="font-size:18px;"></span> Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
	</div>
</div>
