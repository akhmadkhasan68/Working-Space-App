<script>
    let contentSection = $("#page-content");

    $(document).ready(() => {
        renderPage(`<?= site_url('owner/myworkingspace/render/home') ?>`)
    })

    const renderPage = (url) => {
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
</script>