<header class="header-4 skew-separator bg-primary">
    <div class="header-wrapper">
        <div class="page-header mt-5">
            <div class="container">
                <div class="row align-items-center text-left">
                    <div class="col-lg-6 col-12">
                        <h1 class="display-3">
                            Masuk Untuk Melanjutkan,<span class="text-white"> Pegalaman Reservasi Lebih Mudah.</span>
                        </h1>
                        <p class="lead pb-4 text-white">
                            Kami adalah platform penyedia pilihan tempat Co-Working Space Terbesar Se Malang
                            Raya. Daftar dan temukan tempat nyaman untuk bekerja bagi anda.
                        </p>
                    </div>
                    <div class="col-lg-6 col-12 pl-0">
                        <div class="card shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Masukkan E-Mail dan Password Anda</small>
                                </div>
                                <form role="form" method="post" id="login_form">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Masukkan Username atau Email" name="email" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Masukkan Password" name="password" type="password" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-white mb-4">
                                    <small>Belum Mempunyai Akun?</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= site_url('auth/register_guest')?>" class="btn btn-warning btn-block">Daftar Sebagai <br> member</a>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= site_url('auth/register_owner')?>" class="btn btn-outline-primary btn-block">Daftar Sebagai pemilik
                                    tempat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>