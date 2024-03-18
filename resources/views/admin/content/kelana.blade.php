@extends('admin.layout.main')

@section('title', 'Calon Presiden')
@push('mycss')
    @include('admin.css.css')
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />

    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/sweetalert2/sweetalert2.css" />

    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/fontawesome-free/css/fontawesome.min.css" />
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/uil-mdi-ri-icons/uil-mdi-ri-icons.css" />
    <script src="{{ asset('asset') }}/plugins/sweetalert2/sweetalert2.js"></script>
@endpush
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6">
                    <x-masterkelana>
                    </x-masterkelana>
                </div>
                {{-- ---------------------------------------------------------------------------------------------------------- --}}
                <div class="col-md-6">
                    <x-masterdekela>
                    </x-masterdekela>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="modal-kecamatan">
        <div class="modal-dialog">
            <div class="modal-content pb-2">
                <div class="modal-header">
                    <label class="mb-0">TAMBAH DATA KELANA</label>
                </div>
                <div class="modal-body">
                    <div class="form-group floating">
                        <input type="text" id="kelana" name="kelana" class="form-control floating"
                            autocomplete="off">
                        <label for="password">Judul</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-desa">
        <div class="modal-dialog">
            <div class="modal-content pb-2">
                <div class="modal-header">
                    <label class="mb-0">TAMBAH DATA DEKELA</label>
                </div>
                <div class="modal-body">
                    <div class="form-group floating">
                        <input type="text" id="desa" class="form-control floating" autocomplete="off">
                        <label for="password">Judul</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('java')
    <script>
        //--------------------------------------------------------ADD TOOLTIP FUCNTION HELPER
        function addToolTip(id, place, trigger, title, ) {
            $(id).tooltip({
                placement: place,
                trigger: trigger,
                title: title,
                delay: {
                    "show": 300,
                    "hide": 0
                }
            });
        }

        $(document).ready(function() {
            addToolTip('#table-body input', 'bottom', 'focus', 'press enter to save');
            addToolTip('#kelana', 'bottom', 'focus', 'tekan enter untuk simpan');
            addToolTip('#desa', 'bottom', 'focus', 'tekan enter untuk simpan');
        });

        $(document).ready(function() {

        });
    </script>
    <script>
        $('#modal-kecamatan').on('shown.bs.modal', function() {
            $('#kecamatan').focus();
        })

        $('#modal-desa').on('shown.bs.modal', function() {
            $('#desa').focus();
        })

        $('#modal-kecamatan').on('hidden.bs.modal', function() {
            $('#kecamatan').val('');
        })

        $('#modal-desa').on('hidden.bs.modal', function() {
            $('#desa').val('');
        })

        $("#table-body").on("focus", "input", function(e) {
            $(this).data("previous-value", $(this).val());
        });

        $("#table-body").on("blur", "input", function(e) {
            $(this).val($(this).data("previous-value"));
        });

        $("#table-body-desa").on("focus", "input", function(e) {
            $(this).data("previous-value", $(this).val());
        });

        $("#table-body-desa").on("blur", "input", function(e) {
            $(this).val($(this).data("previous-value"));
        });
    </script>

    @include('admin.js.kecamatan.store-kecamatan')
    @include('admin.js.kecamatan.update-kecamatan')
    @include('admin.js.kecamatan.delete-kecamatan')
    @include('admin.js.kecamatan.show-desa')
    @include('admin.js.kecamatan.store-desa')
    @include('admin.js.kecamatan.update-desa')
    @include('admin.js.kecamatan.delete-desa')



    <script>
        function filterRows() {
            let query = $.trim($('#cari_kecamatan').val().toUpperCase());
            $('#table-body tr').each(function() {
                let animal1 = $(this).closest('tr').find('input').val().trim().toUpperCase();

                if (animal1.indexOf(query) !== -1) {
                    $(this).closest('tr').show(); //Show
                } else {
                    $(this).closest('tr').hide(); //Hide
                }
            });
        }
        $('#cari_kecamatan').on('input', filterRows);
    </script>

    <script>
        function filterRows() {
            let query = $.trim($('#cari_desa').val().toUpperCase());
            $('#table-body-desa tr').each(function() {
                let animal1 = $(this).closest('tr').find('input').val().trim().toUpperCase();

                if (animal1.indexOf(query) !== -1) {
                    $(this).closest('tr').show(); //Show
                } else {
                    $(this).closest('tr').hide(); //Hide
                }
            });
        }
        $('#cari_desa').on('input', filterRows);
    </script>


    {{-- let token = $("meta[name='csrf-token']").attr("content"); --}}
@endpush
