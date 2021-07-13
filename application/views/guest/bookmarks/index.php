<div class="page-header page-header-small header-filter">
	<div class="page-header-image"
		style="background-image: url('https://source.unsplash.com/random/800x600');"></div>
	<div class="container pt-0">
		<div class="row">
			<div class="col-lg-6 col-md-7 mx-auto text-center">
				<h1 class="title text-white font-weight-bold">Daftar Bookmark Anda</h1>
			</div>
		</div>
	</div>
</div>
<div class="main">
	<div class="container">
        <?php if(count($bookmarks) == 0):?>
            <div class="row" style="margin-bottom:300px;">
                <div class="col-lg-12">
                    <div class="alert alert-warning">
                        Anda belum menambahkan data bookmark apapun!
                    </div>
                </div>
            </div>
        <?php else:?>
            <div class="row">
                <?php foreach($bookmarks as $k_bookmark => $v_bookmark):?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-product shadow">
                        <img class="card-img-top" src="<?= base_url('uploads/photos')?>/<?= $v_bookmark['photos'][0]['photo']?>" alt="...">
                            <div class="card-body">
                                <h5 class="d-inline p-2card-title font-weight-bold"><?= $v_bookmark['name']?></h5>

                                <div class="d-flex justify-content-between mt-2">
                                    <small class=" text-muted"><i class="fa fa-map-marker"></i> <?= $v_bookmark['regency']?></small>
                                    <small class=" text-muted"><i class="fa fa-money"></i> <?= $v_bookmark['price']?>/Jam</small>
                                    <small class=" text-muted"><i class="fa fa-users"></i> <?= $v_bookmark['capacity']?></small>
                                </div>

                                <div class="card-footer">
                                    <div class="d-flex justify-content-between mt-2">
                                        <a href="<?php echo site_url('guest/products/detail/')?><?= $v_bookmark['id']?>" class="mr-3 btn btn-primary btn-block btn-sm">
                                            <i class="fa fa-info-circle"></i> Detail
                                        </a>
                                        <button class="btn <?= ($v_bookmark['bookmark']) ? 'btn-danger' : 'btn-outline-danger'?> btn-block btn-sm" onclick="addBoomark(this, <?= $v_bookmark['id']?>)">
                                            <i class="fa fa-bookmark-o"></i> Bookmark
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
	</div>
</div>
