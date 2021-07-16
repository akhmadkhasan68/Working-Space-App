<form id="my-form" onsubmit="formSubmit(event)">
    <?php if(!empty($data)):?>
        <input type="hidden" name="id" value="<?= $data->id?>">
    <?php endif;?>

    <div class="form-group">
        <label for="" class="font-weight-bold">Nama</label>
        <input type="text" name="name" class="form-control form-control-alternative" placeholder="Masukkan Nama Menu anda disini" value="<?= isset($data) ? $data->name : ''?>">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
</form>