<div class="card">
    <div class="card-header">
        <h4 class="card-title font-weight-bold">Reservasi</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <b>Info!</b>
                    Halaman ini digunakan untuk melihat data reservasi dari Co-Working Space anda.
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-6 col-12">
                <select name="status_reservation" id="status_reservation" class="form-control">
                    <option value="">Filter Status Reservasi</option>
                    <option value="">All</option>
                    <option value="0">Menunggu Konfirmasi</option>
                    <option value="1">Berhasil</option>
                    <option value="2">Gagal/Dibatalkan</option>
                </select>
            </div>
            <div class="col-lg-6 col-12">
                <select name="status_payment" id="status_payment" class="form-control">
                    <option value="">Filter Status Pembayaran</option>
                    <option value="">All</option>
                    <option value="done_payment">Sudah Bayar</option>
                    <option value="not_payment">Belum Bayar</option>
                    <option value="refund">Refund</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Penyewa</th>
                                <th>Tanggal Reservasi</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-reservation-body">
                            <!-- <tr>
                                <td>1</td>
                                <td>12 Juni 2021 00:00:00</td>
                                <td>hasan</td>
                                <td>13 Juni 2021 08:00 - 14 Juni 2021 08:00 <span class="badge badge-primary">24 Jam</span></td>
                                <td>Rp. 140.000</td>
                                <td><span class="badge badge-warning">Belum dibayar</span></td>
                                <td>
                                    <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        renderTableReservation();
    });

    $("#status_reservation").on('change', (e) => {
        let status_reservation = $(e.currentTarget).val();
        let status_payment = $("#status_payment").val();

        $('#status_payment').val("");

        renderTableReservation(status_reservation, status_payment);
    });

    $("#status_payment").on('change', (e) => {
        let status_payment = $(e.currentTarget).val();
        let status_reservation = $("#status_reservation").val();

        renderTableReservation(status_reservation, status_payment);
    });
</script>