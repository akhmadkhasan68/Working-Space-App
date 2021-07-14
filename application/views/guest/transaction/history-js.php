<script>
    $(".toggle-card").on('click', function(){
        let target = $(this).data('target');

        let icon = $(this).find('i');
        if(icon.hasClass('fa-chevron-right'))
        {
            icon.removeClass('fa-chevron-right').addClass('fa-chevron-down');
        }else{
            icon.removeClass('fa-chevron-down').addClass('fa-chevron-right');
        }

        $(target).toggle();
    });

    const detail = (id) => {
        window.location.href = `<?= site_url('guest/transaction/detail')?>/${id}`;
    }
</script>