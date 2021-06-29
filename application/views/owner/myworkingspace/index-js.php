<script>
    let contentSection = $("#page-content");

    $(document).ready(() => {
        renderPage(`<?= site_url('owner/myworkingspace/render/home') ?>`)
    })

    const renderPage = (url) => {
        contentSection.html("");

        $.ajax({
            url: url,
            method: 'GET',
        }).then(res => {
            contentSection.html(res)
        }).fail(err => {
            contentSection.html(`Failed render the content`)
            console.log(err);
        });
    }

    const addImage = () => {
        $("#fileUpload").trigger('click');
    }

    const adjustFacilities = (id, status) => {
        let element = $("#total-added-facilities");
        let add;

        if(status === "destroy"){
            add = parseInt(element.text()) - 1
        }else{
            add = parseInt(element.text()) + 1
        }

        element.html(add)

        $(this).toggleClass('btn btn-danger btn-round');
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
        let latitude = ($("#latitude").val() === "") ? position.coords.latitude : $("latitude").val();
        let longitude = ($("#longitude").val() === "") ? position.coords.longitude : $("longitude").val();

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
</script>