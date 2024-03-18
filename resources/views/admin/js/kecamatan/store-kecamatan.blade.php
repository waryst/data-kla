<script type="text/javascript">
    $('#kelana').keyup(function(e) {
        if (e.which == '13') {
            e.preventDefault();
            if ($.trim(this.value).length) {
                let title = $('#kelana').val();
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: `/master_data`,
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    data: {
                        "tipe": "kelana",
                        "title": title,
                        "_token": token
                    },

                    success: function(response) {
                        window.location = '';
                    }
                });
            }
        }
    });
</script>
