<div class="card">
    <div class="card-header">
        <h4 class="card-title font-weight-bold">Review Home</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <b>Info!</b>
                    Halaman ini digunakan untuk melihat data review dari Co-Working Space anda.
                </div>
            </div>
        </div>

        <?php foreach($data as $k_feedback => $v_feedback):?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <span class="text-primary font-weight-bold text-capitalize"><?= $v_feedback['name']?></h4>
                    <div class="stats">
                        <div class="stars text-warning">
                        <?php for($i = 1; $i <= 5; $i++):?>
                            <?php if($v_feedback['value'] > 0):?>
                                <?php if($i <= $v_feedback['value']):?>
                                    <i class="fas fa-star"></i>	
                                <?php else:?>
                                    <i class="far fa-star"></i>	
                                <?php endif;?>
                            <?php else:?>
                                <i class="far fa-star"></i>
                            <?php endif;?>
                        <?php endfor;?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <p>
                        <?= $v_feedback['description']?>
                    </p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>