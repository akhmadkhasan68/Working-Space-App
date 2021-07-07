<div class="card">
    <div class="card-header">
        <h4 class="card-title font-weight-bold">Menu</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <b>Info!</b>
                    Halaman ini digunakan untuk menyesuaikan data Menu dari Co-Working Space anda. Seperti makanan, snack, minuman, dll.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-12">
                <select name="filter" id="filter" class="form-control">
                    <option value="">Filter Jenis Menu</option>
                    <option value="food">Makanan</option>
                    <option value="baverage">Minuman</option>
                    <option value="snack">Snack</option>
                    <option value="other">Lainnya</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="menu-tablebody">
                            <!-- <tr>
                                <td>1</td>
                                <td>Es Degan</td>
                                <td>Rp. 12.000</td>
                                <td><span class="badge badge-success">Minuman</span></td>
                                <td>
                                    <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
        renderTableMenu(null);
    });

    $("#filter").on('change', function(){
        renderTableMenu($(this).val());
    });
</script>