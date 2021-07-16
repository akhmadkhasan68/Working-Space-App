<form id="my-form-menu" onsubmit="formMenuSubmit(event)">
    <input type="hidden" name="place_id" value="<?= $place_id?>">
    <?php if(!empty($menu)):?>
        <input type="hidden" name="id" value="<?= $menu->id?>">
    <?php endif;?>

    <div class="form-group">
        <label for="" class="font-weight-bold">Nama</label>
        <input type="text" name="name" class="form-control form-control-alternative" placeholder="Masukkan Nama Menu anda disini" value="<?= isset($menu) ? $menu->name : ''?>">
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label for="" class="font-weight-bold">Tipe</label>
            <select name="type" class="form-control form-control-alternative" id="type">
                <option value="">Pilih Jenis Menu</option>
                <option value="food" <?php if(isset($menu) && $menu->type == 'food'):?> selected <?php endif;?>>Makanan</option>
                <option value="baverage" <?php if(isset($menu) && $menu->type == 'baverage'):?> selected <?php endif;?>>Minuman</option>
                <option value="snack" <?php if(isset($menu) && $menu->type == 'snack'):?> selected <?php endif;?>>Snack</option>
                <option value="other" <?php if(isset($menu) && $menu->type == 'other'):?> selected <?php endif;?>>Lainnya</option>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label for="" class="font-weight-bold">Deskripsi</label>
            <textarea name="description" class="form-control form-control-alternative" rows="3" placeholder="Tulis deskripsi Menu anda disini..."><?= isset($menu) ? $menu->description : ''?></textarea>
        </div>
    </div>
    
    <div class="form-group mt-3">
        <label for="" class="font-weight-bold">Harga</label>
        <div class="input-group input-group-alternative mb-4">
            <input name="price" class="form-control form-control-alternative" placeholder="Masukkan harga disini..." type="text" value="<?= isset($menu) ? $menu->price : ''?>">
        </div>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
</form>