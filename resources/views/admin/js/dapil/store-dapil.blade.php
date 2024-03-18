<script type="text/javascript">
    $('#dapil').keyup(function(e) {
        if (e.which == '13') {
            e.preventDefault();
            if ($.trim(this.value).length) {
                let title = $('#dapil').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('tahun') }}",
                    type: "POST",
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
