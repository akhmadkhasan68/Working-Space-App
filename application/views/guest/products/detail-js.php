<script>
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

	const create_transaction = (url) => {
		let from_date = $("#from_date").val();
		let to_date = $("#to_date").val();
		let not_login = `<?= $this->session->userdata('is_login') == null || $this->session->userdata('role') != 'guest'?>`;

        if(not_login == 1)
        {
            Swal.fire({
                icon: 'error',
                title: `Opps...`,
                text: `anda harus login!`
            });

            return;
        }

		if(from_date.length == 0 || to_date.length == 0)
		{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Tanggal Awal atau Tanggal Akhir reservasi harus diisi!',
			});
			return;
		}
		
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Apakah anda yakin akan melakukan reservasi tempat ini?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Batal',
			confirmButtonText: 'Ya'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: `${url}`,
					method: 'post',
					dataType: 'json',
					data: {
						from_date, to_date	
					},
				}).
				then(res => {
					if(res.error)
					{
						Swal.fire({
							icon: 'error',
							title: `Opps...`,
							text: `${res.message}`
						});
					}else{
						Swal.fire({
							icon: 'success',
							title: `Selamat`,
							text: `${res.message}`
						});

						setTimeout(() => {
							window.location.replace(`<?= site_url('guest/transaction/detail/')?>${res.data_id}`);
						}, 1000);
					}
				}).catch(err => {
					console.log(err);
				})
			}
		})
    }

    let map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
        center: [<?= $place['longitude']?>, <?= $place['latitude']?>], // starting position [lng, lat]
        zoom: 15, // starting zoom
    });

    let marker = new mapboxgl.Marker().setLngLat([<?= $place['longitude']?>, <?= $place['latitude']?>]).addTo(map);
</script>