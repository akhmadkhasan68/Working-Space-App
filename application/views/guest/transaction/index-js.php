<script>
    $("#my-form").on('submit', function(e){
        e.preventDefault();

        let data = new FormData(this);

        $.ajax({
            url: `<?= site_url('guest/transaction/upload_transaction')?>`,
            data: data,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST'
        }).done((res) => {
            if(res.error){
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
                        target: document.getElementById('modal-form-upload'),
                    });
                }

                return;
            }else{
                toastr.success(res.message, 'Berhasil');

                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }).catch((err) => {
            console.log(err)
        });
    })

    const rejectTransaction = (id) => {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: `apakah anda yakin untuk membatalkan proses transaksi/reservasi ini?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `<?= site_url('guest/transaction/reject')?>`,
                    method: 'post',
                    dataType: 'json',
                    data: {
                        id
                    },
                }).
                then(res => {
                    toastr.success(`${res.message}`, `Berhasil`);

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