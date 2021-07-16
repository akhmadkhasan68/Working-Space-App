<script>
    $(document).ready(() => {
        getTable();
    });

    const getTable = () => {
        $.ajax({
            url: `<?= site_url('admin/users/get_table')?>`,
            method: 'get',
            dataType: 'json',
        }).then(res => {
            let html = ``;
            if(Object.keys(res.data).length > 0)
            {
                let no = 1;
                Object.entries(res.data).forEach(([key, val]) => {
                    html += `
                        <tr>
                            <td>${no++}</td>
                            <td>${val.name}</td>
                            <td>${val.username}</td>
                            <td>${val.email}</td>
                            <td>${getRole(val.type)}</td>
                            <td>${val.created_at}</td>
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

    const getRole = (role) => {
        let html = ``;

        if(role === 'guest')
        {
            html = `<span class="badge badge-success">Pengunjung</span>`;
        }else{
            html = `<span class="badge badge-warning">Owner</span>`;
        }

        return html;
    }
</script>