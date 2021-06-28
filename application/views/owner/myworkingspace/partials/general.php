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
            <div class="form-group">
                <label for="" class="font-weight-bold">Nama</label>
                <input type="text" class="form-control form-control-alternative" placeholder="Masukkan Nama Co-Working anda disini">
            </div>
            <div class="form-group">
                <label for="" class="font-weight-bold">Harga Sewa</label>
                <div class="input-group input-group-alternative mb-4">
                    <input class="form-control form-control-alternative" placeholder="Masukkan harga sewa disini.." type="text">
                    <div class="input-group-append">
                        <span class="input-group-text font-weight-bold" >/ Jam</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="font-weight-bold">Deskripsi</label>
                    <textarea class="form-control form-control-alternative" rows="3" placeholder="Tulis deskripsi Co-Working anda disini..."></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="" class="font-weight-bold">Foto</label>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2 justify-content-center">
                            <button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="addImage()" style="height:100%"><i class="fa fa-plus-circle"></i></button>
                            <input type="file" id="fileUpload" style="display:none;" name="file" accept="image/png, image/gif, image/jpeg" >
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>