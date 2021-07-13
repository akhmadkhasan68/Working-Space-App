<script>
    $(document).ready(() => {
        search();
    });

    let name = document.getElementById("name-search");

    name.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("btn-search").click();
        }
    }); 

    $("#btn-search").on('click', () => {
        search(name.value)
    })

    const search = (name = null) => {
        $.ajax({
            url: `<?= site_url('guest/products/get_search')?>`,
            method: 'post',
            data: {
                name
            }
        }).
        then(res => {
            $("#search-result").html(res);
        }).catch(err => {
            console.log(err)
        })
    }
</script>