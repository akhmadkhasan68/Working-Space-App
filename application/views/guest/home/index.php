<header class="header-4 skew-separator">
    <div class="header-wrapper">
        <div class="page-header">
            <div class="container">
                <div class="row align-items-center text-left">
                    <div class="col-lg-5 col-12">
                        <h1 class="display-3">
                            Gabung Bersama Kami,<span class="text-primary"> Reservasi Lebih Mudah.</span>
                        </h1>
                        <p class="lead pb-4">
                            Kami adalah platform penyedia pilihan tempat Co-Working Space Terbesar Se Malang
                            Raya. Daftar dan temukan tempat nyaman untuk bekerja bagi anda.
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= site_url('auth/register_guest')?>" class="btn btn-warning btn-block">Daftar Sebagai member</a>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= site_url('auth/register_owner')?>" class="btn btn-outline-primary btn-block">Daftar Sebagai pemilik
                                    tempat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 pl-0">
                        <img class="ml-lg-5" src="<?php echo base_url();?>assets/guest/img/ill/bg6-2.svg" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="section features-1">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <!-- <span class="badge badge-primary badge-pill mb-3">Insight</span> -->
                <h3 class="display-3">Kenapa Harus Platform Kami?</h3>
                <p class="lead">Alasan kenapa harus menggunakan platform kami</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                        <i class="ni ni-headphones"></i>
                    </div>
                    <h6 class="info-title text-uppercase text-primary">Layanan 24/7</h6>
                    <p class="description opacity-8">Anda dapat melakukan pemesanan dan transaksi kapanpun.
                        Karena sistem kami akan selalu siap 24/7.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                        <i class="ni ni-collection"></i>
                    </div>
                    <h6 class="info-title text-uppercase text-success">Banyak Pilihan & Selalu Update</h6>
                    <p class="description opacity-8">Beberapa pilihan tempat kami akan selalu update dan anda
                        akan banyak diberikan pilihan tempat yang beragam.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                        <i class="fa fa-undo"></i>
                    </div>
                    <h6 class="info-title text-uppercase text-warning">100% Refund</h6>
                    <p class="description opacity-8">100% pengembalian dana untuk anda jika anda melakukan
                        pembatalan reservasi.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="">
    <div class="container">
        <div class="row mb-md-5">
            <div class="col-md-8 mx-auto">
                <h3 class="display-3 text-center">Rekomendasi Kami</h3>
                <p class="lead text-center">Beberapa pilihan tempat Co-Working Space rekomendasi kami.</p>
            </div>
        </div>
        <div class="row">
            <?php foreach($places as $k_place => $v_place):?>
                <div class="col-lg-4">
                    <div class="card card-product shadow">
                        <img class="card-img-top" src="<?= base_url('uploads/photos')?>/<?= $v_place['photos'][0]['photo']?>" alt="...">
                        <div class="card-body">
                            <h5 class="d-inline p-2card-title font-weight-bold"><?= $v_place['name']?></h5>

                            <div class="d-flex justify-content-between mt-2">
                                <small class=" text-muted"><i class="fa fa-map-marker"></i> <?= $v_place['regency']?></small>
                                <small class=" text-muted"><i class="fa fa-money"></i> <?= number_format($v_place['price'],0,',','.')?>/Jam</small>
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
</section>
<br>
<br>
<br>