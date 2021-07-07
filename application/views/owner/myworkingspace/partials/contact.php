<div class="card">
    <div class="card-header">
        <h4 class="card-title font-weight-bold">Kontak</h4>
    </div>
    <div class="card-body">
        <div class="row">
			<div class="col-md-12">
				<div class="alert alert-info">
					<b>Info!</b>
					Halaman ini digunakan untuk menyesuaikan data Kontak dari Co-Working Space anda. 
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12">
                <form method="post" id="formContact">
                    <?php
                        $contacts = ["Whatsapp", "Instagram", "Twitter", "Facebook", "Email", "Website"];
                    ?>

                    <?php foreach($contacts as $k_contact => $v_contact):?>
                        <div class="form-group form-group-alternative">
                            <label for="">Nomor <?= $v_contact;?> <span class="text-danger">*Kosongi jika tidak ada</span></label>
                            <div class="input-group input-group-alternative mb-4">
                                <input type="text" class="form-control form-control-alternative timepicker" id="exampleFormControlInput1" placeholder="Masukkan <?= $v_contact?>" value="<?= (isset($data[$v_contact])) ? $data[$v_contact]->value : ''?>" name="<?= strtolower($v_contact)?>">
                                <?php if(isset($data[$v_contact])):?>
                                    <div class="input-group-append">
                                        <button type="button" onclick="deleteContacts(`<?= $data[$v_contact]->id ?>`)" class="input-group-text"><i class="fa fa-times-circle text-danger"></i></button>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach;?>

                    <div class="row">
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-success" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#formContact").on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: `<?= site_url('owner/contacts/save')?>`,
            method: 'post',
            dataType: 'json',
            data: $(this).serialize(),
        }).
        then(res => {
            toastr.success(res.message, 'Berhasil');
        }).
        fail(err => {
            console.log(err)
        });
    });
</script>