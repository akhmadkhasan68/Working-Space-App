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
                                        if( preg_match( '!\(([^\)]+)\)!', $v_data->value, $match))
                                            $bank = $match[1];  
                                    ?>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend mr-3">
                                                <select name="" data-payment_id="<?= $v_data->id?>" id="bank" class="form-control form-control-alternative">
                                                    <option value="">Pilih Bank</option>
                                                    <option value="BNI" <?= (isset($bank) && $bank == 'BNI') ? 'selected' : ''?>>BNI</option>
                                                    <option value="BRI" <?= (isset($bank) && $bank == 'BRI') ? 'selected' : ''?>>BRI</option>
                                                    <option value="BSI" <?= (isset($bank) && $bank == 'BSI') ? 'selected' : ''?>>BSI</option>
                                                    <option value="Mandiri" <?= (isset($bank) && $bank == 'Mandiri') ? 'selected' : ''?>>Mandiri</option>
                                                    <option value="BCA" <?= (isset($bank) && $bank == 'BCA') ? 'selected' : ''?>>BCA</option>
                                                    <option value="Permata" <?= (isset($bank) && $bank == 'Permata') ? 'selected' : ''?>>Permata</option>
                                                </select>
                                            </div>
                                            <input id="bankValue" class="form-control form-control-alternative" placeholder="Masukkan nomor disini..." type="text" onchange="savePaymentBank(this, `<?= $v_data->id?>`)" value="<?= (isset($match[0])) ? str_replace($match[0], '', $v_data->value) : $v_data->value ?>">
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
    $("#bank").on('change', e => {
        let bank = $(e.currentTarget).val();
        let value = `${$('#bankValue').val()} (${bank})`;
        let payment_id = $(e.currentTarget).data('payment_id');

        $.ajax({
            url: `<?= site_url('owner/payments/save')?>`,
            method: 'POST',
            data: {
                payment_id: payment_id,
                value: value
            },
            dataType: 'json'
        }).then(res => {
            toastr.success(res.message, 'Berhasil');
        }).fail(err => {
            console.log(err)
        });
    });
</script>