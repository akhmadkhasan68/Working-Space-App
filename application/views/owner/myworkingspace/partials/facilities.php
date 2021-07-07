<div class="card">
	<div class="card-header">
		<h4 class="card-title font-weight-bold">Fasilitas</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info">
					<b>Info!</b>
					Halaman ini digunakan untuk menyesuaikan data fasilitas dari Co-Working Space anda. 
				</div>
			</div>
		</div>

        <small class="text-muted"><span id="total-added-facilities"><?= count($data['places_facilities']);?></span> Fasilitas ditambahkan</small>

        <div class="row mt-3">
            <div class="col-md-12">
                <?php foreach ($data['facilities'] as $k_data => $v_data):?>
                    <button type="button" onclick="adjustFacilities(<?= $v_data->id ?>, `<?= (isset($v_data->facility_id)) ? 'destroy' : 'add'?>`)" class="btn btn-<?= (isset($v_data->facility_id)) ? 'danger' : 'success'?> btn-round mb-3">
                        <span><?= $v_data->name?></span>
                        <span class="fa fa-<?= (isset($v_data->facility_id)) ? 'minus' : 'plus'?>-circle"></span>
                    </button>
                <?php endforeach;?>
            </div>
        </div>
	</div>
</div>