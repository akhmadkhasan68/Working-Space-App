<script>
	$(document).ready(() => {
		$("#search-result").html(`
			<div class="col-lg-12 mt-5">
				<div class="alert alert-warning">
					<center>
						Silahkan pilih tanggal terlebih dahulu!
					</center>
				</div>
			</div>
		`);
	});

	$("#start_date").flatpickr({
		enableTime: true,
		time_24hr: true
	});

	$("#end_date").flatpickr({
		enableTime: true,
		time_24hr: true
	});

	$("#search-btn").on('click', () => {
		let start_date = $("#start_date").val();
		let end_date = $("#end_date").val();

		if(start_date.length == 0 || end_date.length == 0)
		{
			Swal.fire({
				icon: 'error',
				title: `Peringatan!`,
				text: `Masukkan tanggal awal dan tanggal akhir terlebih dahulu!`
			});

			return;
		}

		search(start_date, end_date);
	});

	const search = (from_date, to_date) => {
        $.ajax({
            url: `<?= site_url('guest/search/get_search')?>`,
            method: 'post',
            data: {
                from_date,
                to_date,
            }
        }).then(res => {
            $("#search-result").html(res);
        }).catch(err => {
            console.log(err)
        })
    }
</script>