<script type="text/javascript">
    $('#desa').keyup(function(e) {
        if (e.which == '13') {
            e.preventDefault();
            if ($.trim(this.value).length) {
                let title = $('#desa').val();
                let kecamatan_id = $('#desa').data("quantity");
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: `/master_data`,
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    data: {
                        "tipe": "dekela",
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
