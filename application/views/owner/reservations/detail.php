<?php if(strtotime($reservation['from_date']) < strtotime(date('Y-m-d H:i:s'))):?>
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger">
            <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Mohon Maaf!</h4> 
            Proses reservasi dan transaksi ini sudah expired karena tanggal penyewaan sudah terlewat.
        </div>
    </div>
</div>
<?php endif;?>

<div class="row mt-3">
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
            <div class="col-md-12 mt-2">
                <small class="mt-0 font-weight-bold text-bold">Tanggal Transaksi Dibuat:</small>
                <small class="pull-right text-muted mt-0 text-capitalize" id="order-date"><?= formattimestamp($reservation['created_at'])?></small>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"></i>Ringkasan Pemesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"></i>Informasi Pembayaran</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content" style="padding:0px;" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
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

            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <tr>
                                <td class="font-weight-bold" width="30%">Nama Penanggung Jawab</td>
                                <td>
                                    <?php if(isset($reservation['status_payment'])):?>
                                        <?= $reservation['name_detail']?>
                                    <?php else:?>
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Alamat Penanggung Jawab</td>
                                <td>
                                    <?php if(isset($reservation['status_payment'])):?>
                                        <?= $reservation['address']?>
                                    <?php else:?>
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    <?php endif;?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Instansi</td>
                                <td>
                                    <?php if(isset($reservation['status_payment'])):?>
                                        <?php if($reservation['instansi'] == "community"):?>
                                            Komunitas
                                        <?php elseif($reservation['instansi'] == "workers"):?>
                                            Pekerja
                                        <?php else:?>
                                            Siswa/Mahasiswa
                                        <?php endif;?>
                                    <?php else:?>
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    <?php endif;?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Penanggung Jawab</td>
                                <td>
                                    <?php if(isset($reservation['status_payment'])):?>
                                        <?= $reservation['phone']?>
                                    <?php else:?>
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    <?php endif;?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Status Pembayaran</td>
                                <td>
                                    <?php if(isset($reservation['status_payment'])):?>
                                        <?php if($reservation['status_payment'] == 'fund'):?>
                                            <span class="badge badge-success">Dibayar</span>
                                        <?php else:?>
                                            <span class="badge badge-danger">Refund</span>
                                        <?php endif;?>    
                                    <?php else:?>
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    <?php endif;?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tanggal Pembayaran</td>
                                <td>
                                    <?php if(isset($reservation['status_payment'])):?>
                                        <?= formattimestamp($reservation['pay_date'])?>
                                    <?php else:?>
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    <?php endif;?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Metode Pembayaran</td>
                                <td>
                                <?php if(isset($reservation['status_payment'])):?>
                                        <?= $reservation['payment']?>
                                    <?php else:?>
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    <?php endif;?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Butki Pembayaran</td>
                                <td>
                                    <?php if(isset($reservation['status_payment'])):?>
                                        <a href="javascript:void(0)" onclick="detailImg(`<?= base_url('uploads/photos/')?><?= $reservation['photo']?>`)">Lihat Bukti</a>
                                        <!-- <img src="<?= base_url('uploads/photos/')?><?= $reservation['photo']?>" class="img img-fluid img-responsive"> -->
                                    <?php else:?>
                                        <span class="badge badge-warning">Belum Dibayar</span>
                                    <?php endif;?> 
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <?php if($reservation['status'] == 0):?>
            <?php if($reservation['status_payment'] == "fund"):?>
                <div class="alert alert-warning">
                    <h5 class="font-weight-bold text-white"><i class="fa fa-warning"></i> Peringatan!</h5>
                    <p>
                        Transaksi ini sudah dibayar dan membutuhkan konfirmasi anda agar proses transaksi ini dapat diselesaikan.
                    </p>
                </div>
            <?php elseif($reservation['status_payment'] == null):?>
                <div class="alert alert-info" role="alert">
                    <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Info!</h4> 
                    Transaksi belum dibayar. Silahkan melakukan konfirmasi kepada penyewa jika pembayaran tidak segera dibayarkan. 
                </div>
            <?php endif;?>
        <?php elseif($reservation['status'] == 1):?>
            <div class="alert alert-success" role="alert">
                <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Terimakasih!</h4> 
                Proses reservasi dan transaksi ini sudah berhasil. 
            </div>
        <?php elseif($reservation['status'] == 2):?>
            <?php if($reservation['status_payment'] == "refund"):?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Mohon Maaf!</h4> 
                    Proses reservasi dan transaksi ini telah digagalkan oleh anda.
                </div>
            <?php elseif($reservation['status_payment'] == null):?>
                <div class="alert alert-warning" role="alert">
                    <h4 class="h5 text-white font-weight-bold"><i class="fa fa-info-circle"></i> Mohon Maaf!</h4> 
                    Proses reservasi dan transaksi ini telah dibatalkan oleh penyewa.
                </div>
            <?php endif;?>
        <?php endif;?>
    </div>
</div>