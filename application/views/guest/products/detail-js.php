<script>
	let date1 = $("#start_date").flatpickr({
		enableTime: true,
		time_24hr: true,
		minDate: "today",
		onChange: function(selectedDates, dateStr, instance) {
			date2.set('minDate', dateStr)
		}
	});

	let date2 = $("#end_date").flatpickr({
		enableTime: true,
		time_24hr: true,
		onChange: function(selectedDates, dateStr, instance) {
			date1.set('maxDate', dateStr)
		}
	});

	const create_transaction = (url) => {
		let start_date = $("#start_date").val();
		let end_date = $("#end_date").val();

		if(start_date.length == 0 || end_date.length == 0)
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
				window.location.href = url;
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