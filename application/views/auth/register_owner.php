<header class="header-4 skew-separator skew-mini bg-primary">
    <div class="header-wrapper">
        <div class="page-header mt-5">
            <div class="container">
                <div class="row align-items-center text-left">
                    <div class="col-lg-5 col-12">
                        <h1 class="display-3">
                            <b>Gabung Bersama Kami,<span class="text-white"> Buat Tempat Anda Lebih Terjangkau Lebih Luas.</span></b>
                        </h1>
                        <p class="lead pb-4 text-white">
                            Kami adalah platform penyedia pilihan tempat Co-Working Space Terbesar Se Malang
                            Raya. Daftar dan temukan tempat nyaman untuk bekerja bagi anda.
                        </p>
                    </div>
                    <div class="col-lg-7 col-12 pl-0">
                        <div class="card shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Buat Akun Anda Untuk Melanjutkan</small>
                                </div>
                                <form role="form" method="post" id="register_form">
                                    <input type="hidden" name="role" value="owner">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Masukkan Nama Lengkap" name="name" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Msukkan Email" name="email" type="email" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Masukkan Username" name="username" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Masukkan Password" name="password" type="password" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Masukkan Konfirmasi Password" name="conf_password" type="password" >
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">Daftar</button>
                                    </div>

                                    <div class="text-center">
                                        <small class="text-muted">Sudah punya akun? <a href="<?= site_url('auth/login')?>">Masuk</a></small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>