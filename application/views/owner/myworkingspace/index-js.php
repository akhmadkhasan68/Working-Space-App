<script>
    let contentSection = $("#page-content");

    $(document).ready(() => {
        renderPage(`<?= site_url('owner/myworkingspace/render/home') ?>`)
    })

    const renderPage = (url) => {
        // contentSection.empty();

        $.ajax({
            url: url,
            method: 'GET',
        }).then(res => {
            contentSection.empty().append(res);
        }).fail(err => {
            contentSection.empty().append(`Failed render the content`);
            // contentSection.html(`Failed render the content`)
            console.log(err);
        });
    }

    const addImage = () => {
        $("#fileUpload").trigger('click');
    }

    const adjustFacilities = (id, status) => {
        if(status === "destroy"){
            $.ajax({
                url: `<?= site_url('owner/facilities/destroy') ?>`,
                data: {
                    facility_id: id
                },
                dataType: 'json',
                method: 'post'
            }).then(res => {
                if(res.error)
                {
                    toastr.error(`${res.message}`, 'Gagal')
                }else
                {
                    toastr.success(`${res.message}`, 'Berhasil');
                }

            }).fail(err => {
                console.log(err);
            });
        }else{
            $.ajax({
                url: `<?= site_url('owner/facilities/add') ?>`,
                data: {
                    facility_id: id
                },
                dataType: 'json',
                method: 'post'
            }).then(res => {
                if(res.error)
                {
                    toastr.error(`${res.message}`, 'Gagal')
                }else{
                    toastr.success(`${res.message}`, 'Berhasil');
                }

            }).fail(err => {
                console.log(err);
            });
        }

        renderPage(`<?= site_url('owner/myworkingspace/render/facilities') ?>`)
    }

     
    let marker = new mapboxgl.Marker({
                        'color': '#ea4335'
                    });

    const getLocation = () => {
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition)
        }else{
            x.innerHTML = "Geolocation is not supported by this browser."
        }
    }

    const showPosition = (position) => {
        let latitude = ($("#latitude").val() === "") ? position.coords.latitude : $("#latitude").val();
        let longitude = ($("#longitude").val() === "") ? position.coords.longitude : $("#longitude").val();

        $("#longitude").val(longitude);
        $("#latitude").val(latitude);

        let map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [longitude, latitude], // starting position [lng, lat]
            zoom: 17 // starting zoom
        });
        marker.setLngLat([longitude, latitude]).addTo(map);

        map.on('click', function(e) {
            // Use the returned LngLat object to set the marker location
            // https://docs.mapbox.com/mapbox-gl-js/api/#lnglat
            marker.setLngLat(e.lngLat).addTo(map);

            // Create variables set to the LngLat object's lng and lat properties
            let lng = e.lngLat.lng;
            let lat = e.lngLat.lat;

            $("#longitude").val(lng);
            $("#latitude").val(lat);
        });
    }

    const savePayment = (e, payment_id) => {
        let value = e.value;

        $.ajax({
            url: `<?= site_url('owner/payments/save')?>`,
            method: 'POST',
            data: {
                payment_id: payment_id,
                value: value
            },
            dataType: 'json'
        }).then(res => {
            toastr.success(res.message, 'Berhasil');
        }).fail(err => {
            console.log(err)
        });
    }

    const savePaymentBank = (e, payment_id) => {
        let bank = $("#bank").val();
        let value = `${e.value} (${bank})`;

        console.log(value);

        $.ajax({
            url: `<?= site_url('owner/payments/save')?>`,
            method: 'POST',
            data: {
                payment_id: payment_id,
                value: value
            },
            dataType: 'json'
        }).then(res => {
            toastr.success(res.message, 'Berhasil');
        }).fail(err => {
            console.log(err)
        });
    }
</script>