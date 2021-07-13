<?php if(count($places) > 0):?>
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
<?php else:?>
    <div class="col-lg-12 mt-5">
        <div class="alert alert-warning">
            Tidak ada hasil
        </div>
    </div>
<?php endif;?>