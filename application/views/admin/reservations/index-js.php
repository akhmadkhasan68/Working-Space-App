<script>
    $(document).ready(() => {
        renderTableReservation();

    });
    const renderTableReservation = (status_reservation = null, status_payment = null, place_id = null) => {
        $.ajax({
            url: `<?= site_url('admin/reservations/get_table')?>`,
            method: 'post',
            dataType: 'json',
            data: {
                status_reservation, status_payment, place_id
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
                            <td>${val.place}</td>
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
                        <td colspan=9><center>Data Kosong!</center></td>
                    </tr>
                `;
            }

            $(`#table-body`).html(html);
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
                    <button class="btn btn-success btn-sm" onclick="confirmReservation(${id})"><i class="fa fa-check-circle"></i> Konfirmasi</button>
                `;
            }else{
                button_action = ``;
                label_status += ` <span class="badge badge-danger">Expired</span>`;
            }

            button_action += ` <button class="btn btn-danger btn-sm" onclick="refundReservation(${id})"><i class="fa fa-times-circle"></i> Refund</button>`;
        }else if(status == 0 && status_payment == null){
            label_status = `<span class="badge badge-warning">Menunggu Konfirmasi</span> <span class="badge badge-danger">Belum dibayar</span>`;
            if(is_expired){
                label_status += ` <span class="badge badge-danger">Expired</span>`;
            }
            button_action = `
                <button class="btn btn-danger btn-sm" onclick="rejectReservation(${id})"><i class="fa fa-times-circle"></i> Batalkan</button>
            `;
        }else if(status == 2 && status_payment == 'fund'){
            label_status = `<span class="badge badge-danger">Gagal/Dibatalkan</span> <span class="badge badge-danger">Belum Direfund</span>`;
            button_action = `
                <button class="btn btn-danger btn-sm" onclick="refundReservation(${id})"><i class="fa fa-times-circle"></i> Refund</button>
            `;
        }else if(status == 2 && status_payment == 'refund'){
            label_status = `<span class="badge badge-danger">Gagal/Dibatalkan</span> <span class="badge badge-success">Sudah Direfund</span>`;
        }else if(status == 2 && status_payment == null){
            label_status = `<span class="badge badge-danger">Gagal/Dibatalkan</span>`;
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
            url: `<?= site_url('admin/reservations/get_detail')?>`,
            method: 'post',
            data: {
                id
            },
        }).then(res => {
            $("#detail-modal").modal('show');
            $("#detail-body").html(res);
        }).cath(err => {
            console.log(err)
        })
    }

    const detailImg = url => {
        Swal.fire({
            imageUrl: url,
            target: document.getElementById('detail-modal')
        })
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

    $("#status_reservation").on('change', (e) => {
        let status_reservation = $(e.currentTarget).val();
        let status_payment = $("#status_payment").val();

        $('#status_payment').val("");

        renderTableReservation(status_reservation, status_payment);
    });

    $("#status_payment").on('change', (e) => {
        let status_payment = $(e.currentTarget).val();
        let status_reservation = $("#status_reservation").val();

        renderTableReservation(status_reservation, status_payment);
    });

    $("#place_id").on('change', (e) => {
        let place_id = $(e.currentTarget).val();
        let status_payment = $("#status_payment").val();
        let status_reservation = $("#status_reservation").val();

        renderTableReservation(status_reservation, status_payment, place_id);
    });
</script>