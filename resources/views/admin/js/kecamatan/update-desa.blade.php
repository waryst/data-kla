<script type="text/javascript">
    $("#table-body-desa").on("keypress", "input", function(e) {
        if (e.which == '13') {
            e.preventDefault();
            if ($.trim(this.value).length) {
                let id = $(this).attr('id');
                let title = $(this).val();
                let token = $("meta[name='csrf-token']").attr("content");
                let original_value = $(this).data("previous-value");
                if ($.trim(title) != $.trim(original_value)) {
                    $.ajax({
                        url: `/master_data/` + id,
                        type: "PATCH",
                        dataType: "json",
                        cache: false,
                        data: {
                            "title": title,
                            "_token": token,
                            "tipe": "dekela"
                        },
                        success: function(response) {
                            window.location = '';
                        }
                    });
                }
            }
        }
    });
</script>
