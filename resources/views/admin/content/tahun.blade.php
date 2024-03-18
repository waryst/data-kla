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
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Data Tahun</legend>
                        <div class="card-body p-0 mb-2 mt-1">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-dapil">
                                        <i class="mdi mdi-plus"></i> Tambah Tahun</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tahun</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        @foreach ($tahun as $th)
                                            <tr>
                                                <td id="{{ $th->id }}">
                                                    <input type="number" value="{{ $th->tahun }}"
                                                        class="form-control form-control-under border-0 ml-0  d-inline urut"
                                                        name="tahun" data-id="{{ $th->id }}" autocomplete="off"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">

                                                </td>
                                                <td class="text-center">




                                                    <div class="form-group">
                                                        @if ($th->status == 1)
                                                            <a href="#"
                                                                class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-on"
                                                                style="width: 86px;">
                                                                <div class="bootstrap-switch-container"
                                                                    style="width: 126px; margin-left: 0px;"><span
                                                                        class="bootstrap-switch-handle-on bootstrap-switch-success"
                                                                        style="width: 42px;">ON</span><span
                                                                        class="bootstrap-switch-label"
                                                                        style="width: 42px;">&nbsp;</span>
                                                                </div>
                                                            </a>
                                                        @elseif ($th->status == 0)
                                                            <a href="{{ url('tahun/' . $th->id) }}"
                                                                class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-off"
                                                                style="width: 86px;">
                                                                <div class="bootstrap-switch-container"
                                                                    style="width: 126px; margin-left: -42px;"><span
                                                                        class="bootstrap-switch-handle-on bootstrap-switch-success"
                                                                        style="width: 42px;">ON</span><span
                                                                        class="bootstrap-switch-label"
                                                                        style="width: 42px;">&nbsp;</span><span
                                                                        class="bootstrap-switch-handle-off bootstrap-switch-default"
                                                                        style="width: 42px;">OFF</span>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="modal-dapil">
        <div class="modal-dialog">
            <div class="modal-content pb-2">
                <div class="modal-header">
                    <label class="mb-0">Tambah Tahun</label>
                </div>
                <div class="modal-body">
                    <div class="form-group floating">
                        <input type="number" min="0"
                            oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null"
                            class="form-control floating" id="dapil" autocomplete="off">
                        <label for="password">Tahun</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('java')
    <script src="{{ asset('asset') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/select2/js/select2.no.title.plugin.js"></script>
    <script>
        $(function() {
            $('.select2').select2({
                selectionTitleAttribute: false
            })

        })
    </script>
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
            addToolTip('#dapil', 'bottom', 'focus', 'Tekan ENTER untuk Simpan');
        });
    </script>
    @include('admin.js.dapil.store-dapil')
    @include('admin.js.dapil.edit-tahun')
    @include('admin.js.dapil.delete-dapil')
    <script>
        $('#modal-dapil').on('shown.bs.modal', function() {
            $('#dapil').focus();
        })

        $('#modal-dapil').on('hidden.bs.modal', function() {
            $('#dapil').val('');
        })
    </script>

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
    <script src="{{ asset('asset') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <script>
        $(function() {
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>

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
            addToolTip('#table-body input', 'bottom', 'focus', 'Tekan enter untuk edit');
        });
    </script>
    {{-- let token = $("meta[name='csrf-token']").attr("content"); --}}
@endpush
