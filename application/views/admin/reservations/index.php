<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data Reservasi</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item active"><a href="#">Data Reservasi</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row mb-3">
        <div class="col-lg-4 col-12">
            <select name="place_id" id="place_id" class="form-control">
                <option value="">Filter Co-Working</option>
                <option value="">All</option>
                <?php foreach($places as $k_place => $v_place):?>
                    <option value="<?= $v_place->id?>"><?= $v_place->name?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-4 col-12">
            <select name="status_reservation" id="status_reservation" class="form-control">
                <option value="">Filter Status Reservasi</option>
                <option value="">All</option>
                <option value="0">Menunggu Konfirmasi</option>
                <option value="1">Berhasil</option>
                <option value="2">Gagal/Dibatalkan</option>
            </select>
        </div>
        <div class="col-lg-4 col-12">
            <select name="status_payment" id="status_payment" class="form-control">
                <option value="">Filter Status Pembayaran</option>
                <option value="">All</option>
                <option value="done_payment">Sudah Bayar</option>
                <option value="not_payment">Belum Bayar</option>
                <option value="refund">Refund</option>
            </select>
        </div>
    </div>
	<div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Data Reservasi</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Taggal Transaksi</th>
                    <th scope="col">Nama Co-Working</th>
                    <th scope="col">Nama Penyewa</th>
                    <th scope="col">Tanggal Reservasi</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-body">
                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Detail Co-Working</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="detail-body">
				
			</div>
		</div>
	</div>
</div>