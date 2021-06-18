<script>
	$("#register_form").on('submit', function (e) {
		e.preventDefault();
		let data = $(this).serialize();

		new Promise((resolve, reject) => {
			$.ajax({
				url: `<?= site_url('auth/do_register')?>`,
				method: 'post',
				data: data,
				dataType: 'json'
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
					        text: res.message
					    });
                    }

					return;
				}

				Swal.fire({
					icon: 'success',
					title: 'Berhasil',
					text: res.message
				});

				setTimeout(() => {
					window.location.href = `<?= site_url('auth/login')?>`;
				}, 1000);
			}).catch((err) => {
				alert(err);
			});
		});
	});

</script>
