<div class="card">
    <div class="card-header">
        <h4 class="card-title font-weight-bold">Data Informasi Umum</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <b>Info!</b>
                    Halaman ini digunakan untuk menyesuaikan data umum dari Co-Working Space anda. Seperti foto, deskripsi, dan Harga Sewa.
                </div>
            </div>
        </div>

        <form action="#" id="formGeneral" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="" class="font-weight-bold">Nama</label>
                <input type="text" class="form-control form-control-alternative" placeholder="Masukkan Nama Co-Working anda disini">
            </div>
            <div class="form-group">
                <label for="" class="font-weight-bold">Harga Sewa</label>
                <div class="input-group input-group-alternative mb-4">
                    <input class="form-control form-control-alternative" placeholder="Masukkan harga sewa disini.." type="text">
                    <div class="input-group-append">
                        <span class="input-group-text font-weight-bold" >/ Jam</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="font-weight-bold">Deskripsi</label>
                    <textarea class="form-control form-control-alternative" rows="3" placeholder="Tulis deskripsi Co-Working anda disini..."></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="" class="font-weight-bold">Foto</label>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2">
                            <img src="https://source.unsplash.com/random/500x500" class="img-responsive img-fluid rounded shadow">
                        </div>
                        <div class="col-md-2 justify-content-center">
                            <button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="addImage()" style="height:100%"><i class="fa fa-plus-circle"></i></button>
                            <input type="file" id="fileUpload" style="display:none;" name="file" accept="image/png, image/gif, image/jpeg" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="" class="font-weight-bold">Alamat</label>
                    <textarea class="form-control form-control-alternative" rows="3" placeholder="Tulis alamat Co-Working anda disini..."></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div id="map" style='width: 100%; height: 300px;-webkit-box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);-moz-box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);box-shadow: 11px 10px 26px -19px rgba(0,0,0,0.96);'></div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // let map = new mapboxgl.Map({
    //     container: 'map',
    //     style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
    //     center: [12.550343, 55.665957], // starting position [lng, lat]
    //     zoom: 17, // starting zoom
    // });

    // let marker = new mapboxgl.Marker().setLngLat([12.550343, 55.665957]).addTo(map);

    $(document).ready(() => {
        getLocation();
    });
    
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
        let latitude = position.coords.latitude;
        let longitude = position.coords.longitude;

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
            var lng = e.lngLat.lng;
            var lat = e.lngLat.lat;

            $("#longitude").val(lng);
            $("#latitude").val(lat);
        });
    }
</script>