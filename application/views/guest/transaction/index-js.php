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
                Object.entries(res.message).forEach(([key, val]) => {
                    toastr.error(val, 'Gagal');    
                });
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

    const ratingStars = [...document.getElementsByClassName("rating__star")];

    function executeRating(stars) {
        const starClassActive = "rating__star fas fa-star";
        const starClassInactive = "rating__star far fa-star";
        const starsLength = stars.length;
        let i;
        stars.map((star) => {
            star.onclick = () => {
                i = stars.indexOf(star);

                if (star.className === starClassInactive) {
                    for (i; i >= 0; --i) stars[i].className = starClassActive;
                } else {
                    for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
                }
                
                let ratingStarsActive = document.getElementsByClassName("rating__star fas fa-star");
                
                $("#ratings").val(ratingStarsActive.length)
            };
            
        });

    }

    executeRating(ratingStars);

    $("#form-feedback").on('submit', e => {
        e.preventDefault();
        let data = $(e.currentTarget).serialize();

        $.ajax({
            url: `<?= site_url('guest/transaction/feedback')?>`,
            method: 'post',
            dataType: 'json',
            data: data,
        }).then(res => {
            Swal.fire({
                icon: 'success',
                title: `Yeay..`,
                text: `${res.message}`
            });

            setTimeout(() => {
                location.reload();
            }, 1000);
        }).catch(err => {
            console.log(err)
        })
    })
</script>