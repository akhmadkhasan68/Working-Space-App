<div class="card">
    <div class="card-header">
        <h4 class="card-title font-weight-bold">Data Informasi Umum</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <b>Info!</b>
                    Halaman ini digunakan untuk menyesuaikan data umum dari Co-Working Space anda. Seperti foto, deskripsi, dan Harga Sewa.
                </div>
            </div>
        </div>

        <form action="#" id="formGeneral" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="place_id" value="<?= isset($data['general']) ? $data['general']->id : ''?>">
            <div class="form-group">
                <label for="" class="font-weight-bold">Nama</label>
                <input type="text" name="name" class="form-control form-control-alternative" placeholder="Masukkan Nama Co-Working anda disini" value="<?= isset($data['general']) ? $data['general']->name : ''?>">
            </div>
            <div class="form-group">
                <label for="" class="font-weight-bold">Harga Sewa</label>
                <div class="input-group input-group-alternative mb-4">
                    <input name="price" class="form-control form-control-alternative" placeholder="Masukkan harga sewa disini.." type="text" value="<?= isset($data['general']) ? $data['general']->price : ''?>">
                    <div class="input-group-append">
                        <span class="input-group-text font-weight-bold" >/ Jam</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="font-weight-bold">Kapasitas Ruangan</label>
                <input name="capacity" class="form-control form-control-alternative" placeholder="Masukkan kapasitas ruang sewa disini.." type="number" value="<?= isset($data['general']) ? $data['general']->capacity : ''?>">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="font-weight-bold">Deskripsi</label>
                    <textarea name="description" class="form-control form-control-alternative" rows="3" placeholder="Tulis deskripsi Co-Working anda disini..."><?= isset($data['general']) ? $data['general']->description : ''?></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="" class="font-weight-bold">Foto</label>
                    <div class="row" id="img-section">
                        <?php foreach ($data['photos'] as $k_photo => $v_photo):?>
                            <div class="col-md-2">
                                <img src="<?= base_url()?>uploads/photos/<?= $v_photo->photo?>" class="img-responsive img-fluid rounded shadow">
                            </div>
                        <?php endforeach;?>

                        <!-- <div> -->
                            <!-- <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow"> -->
                        <!-- </div> -->
                        <div class="col-md-2 justify-content-center">
                            <button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="addImage()" style="height:100%"><i class="fa fa-plus-circle"></i></button>
                            <input type="file" id="fileUpload" style="display:none;" name="file" accept="image/png, image/gif, image/jpeg" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="" class="font-weight-bold">Provinsi</label>
                    <select name="province_id" class="form-control form-control-alternative" id="province_id">
                        <option value="">Pilih Provinsi</option>
                        <?php foreach($provinces as $province):?>
                            <option value="<?= $province->id ?>" <?= (isset($data['general']) && $data['general']->province_id == $province->id) ? 'selected' : ''?>><?=$province->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="" class="font-weight-bold">Kota/Kabupaten</label>
                    <select name="regency_id" class="form-control form-control-alternative" id="regency_id">
                        <option value="">Pilih Kota/Kabupaten</option>
                        <?php foreach($regencies as $regency):?>
                            <option value="<?= $regency->id?>" <?= (isset($data['general']) && $data['general']->regency_id == $regency->id) ? 'selected' : ''?>><?=$regency->name?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="" class="font-weight-bold">Kecamatan</label>
                    <select name="district_id" class="form-control form-control-alternative" id="district_id">
                        <option value="">Pilih Kecamatan</option>
                        <?php foreach($districts as $district):?>
                            <option value="<?= $district->id?>" <?= (isset($data['general']) && $data['general']->district_id == $district->id) ? 'selected' : ''?>><?=$district->name?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="" class="font-weight-bold">Alamat</label>
                    <textarea name="address" class="form-control form-control-alternative" rows="3" placeholder="Tulis alamat Co-Working anda disini..."><?= isset($data['general']) ? $data['general']->address : ''?></textarea>
                </div>
            </div>

            <input type="hidden" name="longitude" id="longitude" value="<?= (isset($data['general'])) ? $data['general']->longitude :'' ?>">
            <input type="hidden" name="latitude" id="latitude" value="<?= (isset($data['general'])) ? $data['general']->latitude :'' ?>">

            <div class="row mt-3">
                <div class="col-md-12">
                    <div id="map" style='width: 100%; height: 300px;-webkit-box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);-moz-box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);'></div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-2">
                    <button class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(() => {
        getLocation();
    });

    $("#fileUpload").on('change', () => {
        let img = document.getElementById("fileUpload").files[0];
        let place_id = $("#place_id").val();
        let data = new FormData();
        data.append('file', img);
        data.append('place_id', place_id);

        $.ajax({
            url: `<?= site_url('owner/general/uploadImg')?>`,
            data: data,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST'
        }).done((res) => {
            if(res.error){
                toastr.error(res.message, 'Gagal');
            }else{
                toastr.success(res.message, 'Berhasil');
                
                $("#img-section").prepend(`
                    <div class="col-md-2">
                        <img src="<?= base_url()?>uploads/photos/${res.data.file_name}" class="img-responsive img-fluid rounded shadow">
                    </div>
                `);
            }
        }).fail((err) => {
            console.log(err)
        });
    });

    $("#province_id").on('change', e => {
        let id = $(e.currentTarget).val();
        $.ajax({
            url: `<?= site_url('owner/place/getRegencies')?>/${id}`,
            dataType: 'json',
        }).done(res => {
            let html = `<option value="">Pilih Kota/Kabupaten</option>`;
            res.data.forEach(data => {
                html += `
                    <option value="${data.id}">${data.name}</option>
                `;
            });

            $("#regency_id").html(html);
        }).fail(err => {
            console.log(err)
        });
    });

    $("#regency_id").on('change', e => {
        let id = $(e.currentTarget).val();
        $.ajax({
            url: `<?= site_url('owner/place/getDistrict')?>/${id}`,
            dataType: 'json',
        }).done(res => {
            let html = `<option value="">Pilih Kecamatan</option>`;
            res.data.forEach(data => {
                html += `
                    <option value="${data.id}">${data.name}</option>
                `;
            });

            $("#district_id").html(html);
        }).fail(err => {
            console.log(err)
        });
    });

    $("#formGeneral").on('submit', e => {
        e.preventDefault();
        let data = $(e.currentTarget).serialize();

        $.ajax({
            url: `<?= site_url('owner/general/update')?>`,
            method: 'post',
            data: data,
            dataType: 'json'
        }).then(res => {
            if (res.error) {
                if(Object.keys(res.message).length > 1)
                {
                    Object.entries(res.message).forEach(([key, val]) => {
                        toastr.error(val, 'Gagal');    
                    });
                }
                else
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.message
                    });
                }

                return;
            }

            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: res.message
            });
        }).fail(err => {
            console.log(err);
        });
    });
</script>