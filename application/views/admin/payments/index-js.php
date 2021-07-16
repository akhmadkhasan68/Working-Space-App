<script>
    $(document).ready(() => {
        getTable();
    });

    const getTable = () => {
        $.ajax({
            url: `<?= site_url('admin/payments/get_table')?>`,
            method: 'get',
            dataType: 'json',
        }).then(res => {
            let html = ``;
            if(Object.keys(res.data).length > 0)
            {
                let no = 1;
                Object.entries(res.data).forEach(([key, val]) => {
                    html += `
                        <tr>
                            <td>${no++}</td>
                            <td>${val.name}</td>
                            <td>${(val.is_bank == 1) ? `<span class="badge badge-success">Ya</span>` : `<span class="badge badge-danger">Tidak</span>`}</td>
                            <td>${val.created_at}</td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="getForm(${val.id})"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" onclick="deleteData(${val.id})" ><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    `;    
                });
            }else{
                html += `
                    <tr>
                        <td colspan=5><center>Data Kosong!</center></td>
                    </tr>
                `;
            }

            $(`#table-body`).html(html);
        }).catch(err => {
            console.log(err)
        })
    }

    const getForm = (id = null) => {
        $.ajax({
            url: `<?= site_url('admin/payments/get_form')?>`,
            method: 'GET',
            data: {
                id: id,
                place_id: `<?= $place->id?>`
            }
        }).then(res => {
            $("#form-modal").modal('show');
            $("#form-body").html(res);
        }).catch(err => {
            console.log(err);
        })
    }

    const formSubmit = e => {
        e.preventDefault();
        let data = $(e.currentTarget).serialize();

        $.ajax({
            url: `<?= site_url('admin/payments/save')?>`,
            method: 'post',
            dataType: 'json',
            data: data,
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
                        text: res.message,
                        target: document.getElementById('form-modal')
                    });
                }

                return;
            }
            
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: res.message,
                target: document.getElementById('form-modal')
            });

            setTimeout(() => {
                location.reload();
            }, 1000);
        }).catch(err => {
            console.log(err)
        })
    }

    const deleteData = (id) => {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: `Data yang dihapus akan hilang sepenuhnya.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `<?= site_url('admin/payments/delete')?>`,
                    method: 'post',
                    dataType: 'json',
                    data: {
                        id
                    },
                }).then(res => {
                    Swal.fire({
                        icon: 'success',
                        title: `Berhasil`,
                        text: `${res.message}`
                    });

                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }).catch(err => {
                    console.log(err)
                })        
            }
        }) 
    }
</script>