<div class="card">
    <div class="card-header">
        <h4 class="card-title font-weight-bold">Pembayaran</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <b>Info!</b>
                    Halaman ini digunakan untuk menyesuaikan data pembayaran yang digunakan Co-Working Space anda.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <?php foreach($data as $k_data => $v_data):?>
                        <tr>
                            <th><strong> <?= $v_data->name?></th>
                            <td>
                                <?php if($v_data->is_bank == 1):?>
                                    <?php
                                        if( preg_match( '!\(([^\)]+)\)!', $v_data->value, $match ))
                                            $bank = $match[1];  
                                    ?>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend mr-3">
                                                <select name="" id="bank" class="form-control form-control-alternative">
                                                    <option value="">Pilih Bank</option>
                                                    <option value="BNI" <?= ($bank == 'BNI') ? 'selected' : ''?>>BNI</option>
                                                    <option value="BRI" <?= ($bank == 'BRI') ? 'selected' : ''?>>BRI</option>
                                                    <option value="BSI" <?= ($bank == 'BSI') ? 'selected' : ''?>>BSI</option>
                                                    <option value="Mandiri" <?= ($bank == 'Mandiri') ? 'selected' : ''?>>Mandiri</option>
                                                    <option value="BCA" <?= ($bank == 'BCA') ? 'selected' : ''?>>BCA</option>
                                                    <option value="Permata" <?= ($bank == 'Permata') ? 'selected' : ''?>>Permata</option>
                                                </select>
                                            </div>
                                            <input class="form-control form-control-alternative" placeholder="Masukkan nomor disini..." type="text" onchange="savePayment(this, `<?= $v_data->id?>`)" value="<?= str_replace($match[0], '', $v_data->value)?>">
                                        </div>
                                        <span class="text-danger">*Kosongi jika tidak menggunakan metode pembayaran ini</span>
                                    </div>
                                <?php else:?>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-4">
                                            <input class="form-control form-control-alternative" placeholder="Masukkan nomor disini..." type="text" onchange="savePayment(this, `<?= $v_data->id?>`)" value="<?= $v_data->value?>">
                                        </div>
                                        <span class="text-danger">*Kosongi jika tidak menggunakan metode pembayaran ini</span>
                                    </div>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    const savePayment = (e, payment_id) => {
        let value = e.value;
        let bank = $("#bank").val();

        $.ajax({
            url: `<?= site_url('owner/payments/save')?>`,
            method: 'POST',
            data: {
                payment_id: payment_id,
                value: value,
                bank: bank
            },
            dataType: 'json'
        }).then(res => {
            toastr.success(res.message, 'Berhasil');
        }).fail(err => {
            console.log(err)
        });
    }
</script>