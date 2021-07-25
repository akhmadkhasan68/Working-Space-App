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

    const reConfirm = (id) => {
        Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Apakah anda yakin melakukan aksi?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Batal',
			confirmButtonText: 'Ya'
		}).then((result) => {
			if (result.value) {
                $.ajax({
                    url: `<?= site_url('owner/home/reconfirm')?>`,
                    method: 'post',
                    dataType: 'json',
                    data: {
                        id
                    },
                }).then(res => {
                    if(res.error)
                    {
                        toastr.error(`${res.message}`, 'Gagal')
                    }else
                    {
                        toastr.success(`${res.message}`, 'Berhasil');
                    }

                    renderPage(`<?= site_url('owner/myworkingspace/render/home') ?>`)
                }).catch(err => {
                    console.log(err);
                })
			}
		})
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

    const saveDay = (day_id, e) => {
        $.ajax({
            url: `<?= site_url('owner/operational/save_day')?>`,
            method: 'post',
            dataType: 'json',
            data: {
                day_id: day_id,
                status: (e.checked) ? 1 : 0
            }
        }).
        then(res => {
            toastr.success(res.message, 'Berhasil');
        }).
        fail(err => {
            console.log(err)
        })

        renderPage(`<?= site_url('owner/myworkingspace/render/operational') ?>`)
    }

    const saveTime = (id, column, e) => {
        $.ajax({
            url: `<?= site_url('owner/operational/save_time')?>`,
            method: 'post',
            dataType: 'json',
            data: {
                id: id,
                column: column,
                value: e.value
            }
        }).
        then(res => {
            toastr.success(res.message, 'Berhasil');
        }).
        fail(err => {
            console.log(err)
        });

        renderPage(`<?= site_url('owner/myworkingspace/render/operational') ?>`)
    }

    const deleteContacts = id => {
        $.ajax({
            url: `<?= site_url('owner/contacts/delete')?>`,
            method: 'post',
            dataType: 'json',
            data: {
                id: id
            },
        }).
        then(res => {
            toastr.success(res.message, 'Berhasil');

            setTimeout(() => {
                renderPage(`<?= site_url('owner/myworkingspace/render/contact') ?>`)
            }, 1000);
        }).
        fail(err => {
            console.log(err)
        });
    }

    const renderTableMenu = (filter) => {
        $.ajax({
            url: `<?= site_url('owner/menu/get_table')?>`,
            method: 'get',
            dataType: 'json',
            data: {
                filter: filter
            }
        }).
        then(res => {
            let html = ``;
            if(Object.keys(res.data).length > 0)
            {
                let no = 1;
                Object.entries(res.data).forEach(([key, val]) => {
                    html += `
                        <tr>
                            <td>${no++}</td>
                            <td>${val.name}</td>
                            <td>Rp. ${convertRupiah(val.price)}</td>
                            <td><span class="badge badge-success">${convertTypeMenu(val.type)}</span></td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="formMenu(${val.id})"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" onclick="deleteMenu(${val.id})" ><i class="fa fa-trash"></i></button>
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

            $(`#menu-tablebody`).html(html);
        }).
        fail(err => {
            console.log(err)
        });
    }

    const convertTypeMenu = (type) => {
        if(type == 'food') {
            return 'Makanan';
        }else if(type == 'baverage'){
            return 'Minuman';
        }else if(type == 'snack'){
            return 'Snack';
        }else{
            return 'Other';
        }
    }

    const formMenu = (id = null) => {
        $.ajax({
            url: `<?= site_url('owner/menu/get_form')?>`,
            method: 'GET',
            data: {
                id: id,
                place_id: `<?= $place->id?>`
            }
        }).then(res => {
            $("#add-menu-modal").modal('show');
            $("#add-menu-form").html(res);
        }).catch(err => {
            console.log(err);
        })
    }

    const formMenuSubmit = (e) => {
        e.preventDefault();
        let data = $(e.currentTarget).serialize();

        $.ajax({
            url: `<?= site_url('owner/menu/save')?>`,
            method: 'post',
            dataType: 'json',
            data: data,
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
                        text: res.message,
                        target: document.getElementById('add-menu-modal')
                    });
                }

                return;
            }
            
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: res.message,
                target: document.getElementById('add-menu-modal')
            });

            setTimeout(() => {
                renderPage(`<?= site_url('owner/myworkingspace/render/menu') ?>`)
            }, 1000);
        }).catch(err => {
            console.log(err)
        })
    }

    const deleteMenu = (id) => {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: `Data yang dihapus akan hilang sepenuhnya.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `<?= site_url('owner/menu/delete')?>`,
                    method: 'post',
                    dataType: 'json',
                    data: {
                        id
                    },
                }).then(res => {
                    Swal.fire({
                        icon: 'success',
                        title: `Berhasil`,
                        text: `${res.message}`
                    });

                    setTimeout(() => {
                        renderPage(`<?= site_url('owner/myworkingspace/render/menu') ?>`)
                    }, 1000);
                }).catch(err => {
                    console.log(err)
                })        
            }
        })  
    }

    const renderTableReservation = (status_reservation = null, status_payment = null) => {
        $.ajax({
            url: `<?= site_url('owner/reservations/get_table')?>`,
            method: 'post',
            dataType: 'json',
            data: {
                status_reservation, status_payment
            }
        }).then(res => {
            let html = ``;
            if(Object.keys(res.data).length > 0)
            {
                let no = 1;
                Object.entries(res.data).forEach(([key, val]) => {
                    let {label_status, button_action} = convertStatusReservation(val);

                    html += `
                        <tr>
                            <td>${no++}</td>
                            <td>${ val.code.toString().toUpperCase()}</td>
                            <td>${val.created_at}</td>
                            <td>${val.name}</td>
                            <td>${val.from_date} - ${val.to_date} <br> <span class="badge badge-primary">${val.hours} jam x Rp.${convertRupiah(val.price)}</span></td>
                            <td>Rp. ${convertRupiah(val.total)}</td>
                            <td>${label_status}</td>
                            <td>
                                <button class="btn btn-icon btn-sm btn-info" onclick="getDetailReservation(${val.id})"><i class="fa fa-info-circle"></i> Detail Info</button>
                                ${button_action}
                            </td>
                        </tr>
                    `;    
                });
            }else{
                html += `
                    <tr>
                        <td colspan=7><center>Data Kosong!</center></td>
                    </tr>
                `;
            }

            $(`#table-reservation-body`).html(html);
        }).catch(err => {
            console.log(err)
        });
    }

    const convertStatusReservation = ({status, status_payment, id, from_date, to_date}) => {
        let label_status = ``;
        let button_action = ``;
        let date_now = new Date();
        let date_from = new Date(`${from_date}`);

        let is_expired = (date_now.getTime() > date_from.getTime())

        if(status == 0 && status_payment != null){
            label_status = `<span class="badge badge-warning">Menunggu Konfirmasi</span> <span class="badge badge-success">Sudah dibayar</span>`;
            if(!is_expired){
                button_action = `
                    <button class="btn btn-success btn-sm"><i class="fa fa-check-circle" onclick="confirmReservation(${id})"></i> Konfirmasi</button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-times-circle" onclick="rejectReservation(${id})"></i> Refund</button>
                `;
            }else{
                button_action = ``;
                label_status += ` <span class="badge badge-danger">Expired</span>`;
            }
        }else if(status == 0 && status_payment == null){
            label_status = `<span class="badge badge-warning">Menunggu Konfirmasi</span> <span class="badge badge-danger">Belum dibayar</span>`;
            if(is_expired){
                label_status += ` <span class="badge badge-danger">Expired</span>`;
            }
            button_action = `
                <button class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Batalkan</button>
            `;
        }else if(status == 2 && status_payment == 'fund'){
            status = `<span class="badge badge-danger">Gagal/Dibatalkan</span> <span class="badge badge-danger">Belum Direfund</span>`;
            button_action = `
                <button class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Refund</button>
            `;
        }else if(status == 2 && status_payment == 'refund'){
            label_status = `<span class="badge badge-danger">Gagal/Dibatalkan</span> <span class="badge badge-success">Sudah Direfund</span>`;
        }else{
            label_status = `<span class="badge badge-success">Berhasil</span>`;
        }

        return {
            label_status: label_status,
            button_action: button_action
        };
    }

    const getDetailReservation = id => {
        $.ajax({
            url: `<?= site_url('owner/reservations/get_detail')?>`,
            method: 'post',
            data: {
                id
            },
        }).then(res => {
            $("#modal-detail-reservation").modal('show');
            $("#body-detail-reservation").html(res);
        }).cath(err => {
            console.log(err)
        })
    }

    const detailImg = url => {
        Swal.fire({
            imageUrl: url,
            target: document.getElementById('modal-detail-reservation')
        })
    }

    const confirmReservation = id => {
        
    }

    const convertRupiah = (number) => {
        let	str_number = number.toString(),
        sisa 	= str_number.length % 3,
        rupiah 	= str_number.substr(0, sisa),
        ribuan 	= str_number.substr(sisa).match(/\d{3}/g);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah
    }
</script>