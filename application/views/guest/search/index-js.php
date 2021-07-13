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

	let date1 = $("#from_date").flatpickr({
		enableTime: true,
		time_24hr: true,
		minDate: "today",
		onChange: function(selectedDates, dateStr, instance) {
			date2.set('minDate', dateStr)
		}
	});

	let date2 = $("#to_date").flatpickr({
		enableTime: true,
		time_24hr: true,
		onChange: function(selectedDates, dateStr, instance) {
			date1.set('maxDate', dateStr)
		}
	});

	$("#search-btn").on('click', () => {
		let from_date = $("#from_date").val();
		let to_date = $("#to_date").val();

		if(from_date.length == 0 || to_date.length == 0)
		{
			Swal.fire({
				icon: 'error',
				title: `Opps...`,
				text: `Masukkan tanggal awal dan tanggal akhir terlebih dahulu!`
			});

			return;
		}

		search(from_date, to_date);
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