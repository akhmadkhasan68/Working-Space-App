<script>
    $("#edit-profile").on('click', e => {
        $(".allow-edit").prop('readonly', false);
        $("#btn-save").prop('disabled', false);
    });

    $("#edit-password").on('click', e => {
        $("#password-section").toggle("slow", () => {
            if($("#password-section").is(":visible")){
                $("#password_change").val(1);
            } else{
                $("#password_change").val(0);
            }
        });
    });

    $("#myForm").on('submit', e => {
        e.preventDefault();
        let data = $(e.currentTarget).serialize();
        
        $.ajax({
            url: `<?= site_url('guest/profile/save')?>`,
            method: 'post',
            dataType: 'json',
            data: data,
        }).then(res => {
            if (res.error) {
                Object.entries(res.message).forEach(([key, val]) => {
                    toastr.error(val, 'Gagal');    
                });
                return;
            }

            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: res.message
            });

            setTimeout(() => {
                location.reload();
            }, 1000);
        }).catch(err => {
            console.log(err)
        })
    });
</script>