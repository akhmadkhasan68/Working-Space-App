<div class="card">
    <div class="card-header">
        <h4 class="card-title font-weight-bold">Home</h4>
    </div>
    <div class="card-body">
        <?php if($data['info']->status == 0):?>
            <div class="alert alert-warning">
                <strong class="h5 font-weight-bold text-white">Perhatian!</strong>
                <br>
                <p>Co-Working anda belum dapat ditampilkan di halaman pencarian pengguna dan dilakukan reservasi sebelum Co-Working anda dikonfirmasi oleh admin. Mohon lengkapi data tempat anda.</p>
            </div>
        <?php elseif($data['info']->status == 2):?>
            <div class="alert alert-danger">
                <strong class="h5 font-weight-bold text-white">Mohon Maaf!</strong>
                <br>
                <p>Co-Working anda <b>Ditolak</b> oleh admin karena beberapa alasan. Mohon masukkan data tempat anda dengan benar dan pastikan telah memenuhi kriteria kami. Setelah itu anda dapat melakukan pengajuan ulang dengan menekan tombol dibawah.</p>

                <button class="btn btn-primary btn-sm" onclick="reConfirm(<?= $data['info']->id?>)">Ajukan Ulang</button>
            </div>
        <?php else:?>
            <div class="alert alert-success">
                <strong class="h5 font-weight-bold text-white">Selamat!</strong>
                <br>
                <p>Co-Working anda telah <b>Diterima</b> oleh admin. Co-Working anda sudah dapat dilihat oleh pengguna lain dan dapat melakukan reservasi. Terimakasih sudah menjadi bagian kami.</p>
            </div>
        <?php endif;?>

        <div class="row">
            <div class="col-lg-3">
                <div class="card bg-gradient-primary">
                    <div class="card-header bg-gradient-primary text-white">
                        <center>
                            <strong><i class="fa fa-history"></i> Semua Reservasi</strong>
                        </center>
                    </div>
                    <div class="card-body">
                        <center>
                            <div class="display-2 text-white my-0"><?= count($data['reservations'])?></div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-gradient-success">
                    <div class="card-header bg-gradient-success text-white">
                        <center>
                            <strong><i class="fa fa-check-circle"></i> Reservasi Berhasil</strong>
                        </center>
                    </div>
                    <div class="card-body">
                        <center>
                            <div class="display-2 text-white my-0"><?= count($data['reservations_success'])?></div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-gradient-danger">
                    <div class="card-header bg-gradient-danger text-white">
                        <center>
                            <strong><i class="fa fa-times-circle"></i> Reservasi Gagal</strong>
                        </center>
                    </div>
                    <div class="card-body">
                        <center>
                            <div class="display-2 text-white my-0"><?= count($data['reservations_denied'])?></div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-gradient-warning">
                    <div class="card-header bg-gradient-warning text-white">
                        <center>
                            <strong><i class="fa fa-time-circle"></i> Menunggu Diproses</strong>
                        </center>
                    </div>
                    <div class="card-body">
                        <center>
                            <div class="display-2 text-white my-0"><?= count($data['reservations_waiting'])?></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>