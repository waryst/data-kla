<script type="text/javascript">
    $('#table-body').on('click', ".delete-button-kelana", function(e) {
        e.preventDefault();
        let id = $(this).data('quantity');
        let token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'Anda yakin?',
            text: "Menghapus Data KELANA",
            icon: 'warning',
            iconColor: '#fa5c7c',
            showCancelButton: true,
            confirmButtonColor: '#39afd1',
            cancelButtonColor: '#dadee2',
            confirmButtonText: 'Ya, hapus!!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `/master_data/` + id,
                    type: "DELETE",
                    dataType: "json",
                    cache: false,
                    data: {
                        "_token": token,
                    },
                    success: function(response) {
                        window.location = '';
                    }
                });
            }
        });
    });
</script>
