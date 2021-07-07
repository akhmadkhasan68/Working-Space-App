<div class="card">
    <div class="card-header">
        <h4 class="card-title">Jam Operasional</h4>
    </div>
    <div class="card-body">
        <div class="row">
			<div class="col-md-12">
				<div class="alert alert-info">
					<b>Info!</b>
					Halaman ini digunakan untuk menyesuaikan data jam operasional dari Co-Working Space anda. 
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12">
            <table class="table table-bordered">
                    <?php foreach ($data as $k_data => $v_data):?>
                        <tr>
                            <th><strong class="text-capitalize"> <?= $v_data->name ?></th>
                            <td>
                                <div class="custom-control custom-checkbox mb-3" id="<?= $v_data->id?>-CheckBoxSection">
                                    <input class="custom-control-input" id="<?= $v_data->id?>-CheckBox" type="checkbox" onchange="saveDay(`<?= $v_data->id?>`, this)" <?php if($v_data->id_schedule != null):?> checked <?php endif;?>>
                                    <label class="custom-control-label" for="<?= $v_data->id?>-CheckBox">Centang jika hari ini aktif</label>
                                </div>

                                <div class="row" <?php if($v_data->id_schedule == null):?> style="display: none;" <?php endif;?> id="<?= $v_data->id?>-timepickerSection">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-alternative">
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-alternative timepicker" id="exampleFormControlInput1" placeholder="Masukkan jam buka" onchange="saveTime(`<?= $v_data->id_schedule ?>`, 'open', this)" value="<?= ($v_data->open != null) ? $v_data->open : ''?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-alternative">
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-alternative timepicker" id="exampleFormControlInput1" placeholder="Masukkan jam tutup" onchange="saveTime(`<?= $v_data->id_schedule ?>`, 'close', this)" value="<?= ($v_data->close != null) ? $v_data->close : ''?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(".timepicker").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>