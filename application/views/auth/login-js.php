<script>
    $("#login_form").on('submit', function(e){
        e.preventDefault();
        let data = $(this).serialize();
        new Promise((resolve, reject) => {
            $.ajax({
                url: `<?= site_url('auth/do_login')?>`,
                method: "post",
                data: data,
                dataType: 'json'
            })
            .then(res => {
                if(res.error)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.message
                    });

                    return;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: res.message
                });

                setTimeout(() => {
                    window.location.href = `${res.redirect}`;
                }, 1000);
            }).catch(err => {
                console.log(err);
            })
        })
    });
</script>