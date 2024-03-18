<script type="text/javascript">
    $("#table-body").on("keyup", "input", function(e) {
        if (e.which == '13') {
            e.preventDefault();
            if ($.trim(this.value).length) {
                let title = $(this).val();
                let id = $(this).attr('data-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: `/tahun/` + id,
                    type: "PATCH",
                    dataType: "json",
                    cache: false,
                    data: {
                        "title": title,
                    },

                    success: function(response) {
                        window.location = '';


                    },
                    error: function(data) {
                        alert("gagal")
                    }
                });
            }
        }
    });
</script>
