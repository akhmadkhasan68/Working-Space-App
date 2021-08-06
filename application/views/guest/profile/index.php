<div class="page-header page-header-small header-filter">
	<div class="page-header-image"
		style="background-image: url('https://source.unsplash.com/random/800x600');"></div>
	<div class="container pt-0">
		<div class="row">
			<div class="col-lg-6 col-md-7 mx-auto text-center">
				<h1 class="title text-white font-weight-bold">Profil Anda</h1>
			</div>
		</div>
	</div>
</div>
<div class="main">
	<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <button class="btn btn-primary btn-sm d-inline" id="edit-profile"><i class="fa fa-edit"></i> Edit Profile</button>
                                <button class="btn btn-warning btn-sm d-inline" id="edit-password"><i class="fa fa-lock"></i> Edit Password</button>
                            </div>
                        </div>
                        
                        <form id="myForm">
                            <input type="hidden" name="id" value="<?= $data->id?>">
                            <input type="hidden" name="password_change" id="password_change" value="0">
                            <div class="row" id="profile-section">
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Nama</td>
                                            <td>
                                                <input type="text" class="form-control allow-edit" id="name" name="name" value="<?= $data->name?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>
                                                <input type="text" class="form-control allow-edit" id="username" name="username" value="<?= $data->username?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <input type="email" class="form-control allow-edit" id="email" name="email" value="<?= $data->email?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tipe User</td>
                                            <td>
                                                <input type="text" class="form-control" id="name" name="name" value="<?= ($data->type == "guest") ? "Pengunjung" : "Pemilik Tempat"?>" disabled>    
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
    
                            <div class="row" style="display:none;" id="password-section">
                                <div class="col-lg-6">
                                    <div class="form-group form-group-alternative">
                                        <label for="">Password</label>
                                        <div class="input-group input-group-alternative mb-4">
                                            <input type="password" class="form-control form-control-alternative" id="password" placeholder="Masukkan password" value="" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-group-alternative">
                                        <label for="">Konfirmasi Password</label>
                                        <div class="input-group input-group-alternative mb-4">
                                            <input type="password" class="form-control form-control-alternative" id="conf_password" placeholder="Masukkan Konfirmasi password" value="" name="conf_password">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success btn-sm" id="btn-save" type="submit" disabled><i class="fa fa-check-circle"></i> Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
