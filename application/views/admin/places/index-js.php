<script>
    $(document).ready(() => {
        getTable();
    });

    const getTable = () => {
        $.ajax({
            url: `<?= site_url('admin/places/get_table')?>`,
            method: 'get',
            dataType: 'json',
        }).then(res => {
            let html = ``;
            if(Object.keys(res.data).length > 0)
            {
                let no = 1;
                Object.entries(res.data).forEach(([key, val]) => {
                    btnDelete = (val.status == 3) ? `<button class="btn btn-sm btn-danger" onclick="deletePlaces(${val.id})"><i class="fa fa-trash"></i> Hapus</button>` : ``;
                    html += `
                        <tr>
                            <td>${no++}</td>
                            <td>${val.name}</td>
                            <td>${val.capacity}</td>
                            <td>${val.price}</td>
                            <td>${val.created_at}</td>
                            <td>${getStatus(val.status)}</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="getDetail(${val.id})"><i class="fa fa-info-circle"></i> Detail</button>
                                ${btnDelete}
                            </td>
                        </tr>
                    `;    
                });
            }else{
                html += `
                    <tr>
                        <td colspan=5><center>Data Kosong!</center></td>
                    </tr>
                `;
            }

            $(`#table-body`).html(html);
        }).catch(err => {
            console.log(err)
        })
    }

    const getStatus = status => {
        if(status == 1){
            return `<span class="badge badge-success">Aktif</span>`;
        }else if(status == 2){
            return `<span class="badge badge-danger">Tidak Aktif/Ditolak</span>`;
        }else if(status == 3){
            return `<span class="badge badge-danger">Di Non-Aktifkan</span>`;
        }
        else{
            return `<span class="badge badge-warning">Menunggu Konfirmasi</span>`;
        }
    }

    const getDetail = id => {
        $.ajax({
            url: `<?= site_url('admin/places/detail')?>`,
            method: 'post',
            data: {
                id
            },
        }).then(res => {
            $("#detail-modal").modal('show');
            $("#detail-body").html(res);
        }).catch(err => {
            console.log(err)
        })
    }

    const deletePlaces = id => {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: `Semua data yang terkait dengan Co-Working ini akan dihapus.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `<?= site_url('admin/places/delete')?>`,
                    method: 'post',
                    data: {
                        id
                    },
                    dataType:'json',
                }).then(res => {
                    if(res.error){
                        Swal.fire({
                            icon: 'error',
                            title: `Opps...`,
                            text: `${res.message}`
                        });
                    }else{
                        Swal.fire({
                            icon: 'success',
                            title: `Yeayy...`,
                            text: `${res.message}`
                        });

                        setInterval(() => {
                            location.reload();
                        }, 1000);
                    }
                }).catch(err => {
                    console.log(err)
                })
            }
        })
    }

    const getMap = (lang, lat, canvas) => {
        let map_detail = new mapboxgl.Map({
            container: canvas,
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [lang, lat], // starting position [lng, lat]
            zoom: 15, // starting zoom
        });

        let marker = new mapboxgl.Marker().setLngLat([lang, lat]).addTo(map_detail);
    }

    const actionreview = (id, status) => {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: `apakah anda yakin akan melakukan aksi ini. Klik Ya untuk melanjutkan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
            target: document.getElementById('detail-modal')
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `<?= site_url('admin/places/review')?>`,
                    method: 'post',
                    dataType: 'json',
                    data: {
                        id, status
                    },
                }).
                then(res => {
                    Swal.fire({
                        icon: 'success',
                        title: `Horray`,
                        text: `${res.message}`,
                        target: document.getElementById('detail-modal')
                    });
        
                    setInterval(() => {
                        location.reload();
                    }, 1000);
                }).catch(err => {
                    console.log(err)
                })
            }
        })
    }
</script>