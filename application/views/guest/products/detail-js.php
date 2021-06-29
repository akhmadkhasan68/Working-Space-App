<script>
	let start_date = $("#start_date");
	let end_date = $("#end_date");

	start_date.flatpickr({
		enableTime: true,
		time_24hr: true
	});

	end_date.flatpickr({
		enableTime: true,
		time_24hr: true
	});

	const create_transaction = (url) => {
		console.log(start_date.val().length);
		if(start_date.val().length == 0 || end_date.val().length == 0)
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
        center: [12.550343, 55.665957], // starting position [lng, lat]
        zoom: 17, // starting zoom
    });

    let marker = new mapboxgl.Marker().setLngLat([12.550343, 55.665957]).addTo(map);
</script>