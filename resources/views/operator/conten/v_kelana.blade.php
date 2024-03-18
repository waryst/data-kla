@extends('operator.layout.main')

@section('title', 'Data Kelana')
@push('mycss')
    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
            border: 1px solid darkgray !important;
            border-radius: 5px;
        }

        legend.scheduler-border {
            font-size: 1em !important;
            font-weight: bold !important;
            text-align: center !important;
            width: auto;
            padding: 0 10px;
            border-bottom: none;
            margin-bottom: 5px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .kotak {
            position: relative;
            display: flex;
            border: 1px solid;
            border-color: rgb(196, 202, 207);
            height: 38px;
            font-size: 14px;
            font-weight: 400;
            line-height: 21px;
            color: rgb(33, 37, 41);
            padding: 6px 0 6px 12px;
        }
    </style>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/uil-mdi-ri-icons/uil-mdi-ri-icons.css" />
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
@endpush
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <section class="content">
        <div class="container-fluid">
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title">Data KELANA</h3>
                </div>
                <h2 class="card-title mx-auto font-weight-bold mt-">DATA KELANA</h2>
                <h2 class="card-title mx-auto font-weight-bold"> {{ auth()->user()->name }}</h2>
                <h2 class="card-title mx-auto font-weight-bold">TAHUN {{ nama_tahun('') }}</h2>

                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="card px-2 col-md-6 py-4">
                            @foreach ($kelana as $key => $item)
                                @if ($key <= floor(count($kelana) / 2))
                                    <div id="content{{ $item->id }}">
                                        @if ($item->filekelana_count > 0)
                                            <div class="input-group mb-2">
                                                @if ($item->filekelana[0]->status == 2)
                                                @else
                                                    <div class="custom-file">
                                                        <label
                                                            class="custom-file-labelnya">{{ $loop->iteration . '. ' . $item->judul }}
                                                        </label>
                                                    </div>
                                                @endif

                                                @if ($item->filekelana[0]->status == 0)
                                                    <div class="input-group-append">
                                                        <a href="#" class="btn btn-warning">Verifikasi</a>
                                                    </div>
                                                @elseif($item->filekelana[0]->status == 1)
                                                    <div class="input-group-append">
                                                        <a href="#" class="btn btn-success">Diterima</a>
                                                    </div>
                                                @elseif($item->filekelana[0]->status == 2)
                                                    <span class="text-danger" id="{{ $item->id }}Error"></span>
                                                    <div class="input-group mb-2">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="{{ $item->id }}">
                                                            <label class="custom-file-label" id="label{{ $item->id }}"
                                                                for="{{ $item->id }}">{{ $loop->iteration . '. ' . $item->judul }}
                                                            </label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <a href="#" class="btn btn-info upload"
                                                                data-nama="{{ $loop->iteration . '. ' . $item->judul }}"
                                                                data-default="{{ $item->id }}">Reupload</a>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <a href="#"
                                                                onclick="show_note('{{ $item->filekelana[0]->id }}')"
                                                                class="btn btn-danger">Catatan</a>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        @else
                                            <span class="text-danger" id="{{ $item->id }}Error"></span>
                                            <div class="input-group mb-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="{{ $item->id }}">
                                                    <label class="custom-file-label" id="label{{ $item->id }}"
                                                        for="{{ $item->id }}">{{ $loop->iteration . '. ' . $item->judul }}
                                                    </label>
                                                </div>
                                                <div class="input-group-append">
                                                    <a href="#" class="btn btn-info upload"
                                                        data-nama="{{ $loop->iteration . '. ' . $item->judul }}"
                                                        data-default="{{ $item->id }}">Upload</a>
                                                </div>

                                            </div>
                                        @endif

                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="card px-2 col-md-6 py-4">
                            @foreach ($kelana as $key => $item)
                                @if ($key > floor(count($kelana) / 2))
                                    <div id="content{{ $item->id }}">
                                        @if ($item->filekelana_count > 0)
                                            <div class="input-group mb-2">
                                                @if ($item->filekelana[0]->status == 2)
                                                @else
                                                    <div class="custom-file">
                                                        <label
                                                            class="custom-file-labelnya">{{ $loop->iteration . '. ' . $item->judul }}
                                                        </label>
                                                    </div>
                                                @endif
                                                @if ($item->filekelana[0]->status == 0)
                                                    <div class="input-group-append">
                                                        <a href="#" class="btn btn-warning">Verifikasi</a>
                                                    </div>
                                                @elseif($item->filekelana[0]->status == 1)
                                                    <div class="input-group-append">
                                                        <a href="#" class="btn btn-success">Diterima</a>
                                                    </div>
                                                @elseif($item->filekelana[0]->status == 2)
                                                    <span class="text-danger" id="{{ $item->id }}Error"></span>
                                                    <div class="input-group mb-2">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="{{ $item->id }}">
                                                            <label class="custom-file-label" id="label{{ $item->id }}"
                                                                for="{{ $item->id }}">{{ $loop->iteration . '. ' . $item->judul }}
                                                            </label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <a href="#" class="btn btn-info upload"
                                                                data-nama="{{ $loop->iteration . '. ' . $item->judul }}"
                                                                data-default="{{ $item->id }}">Reupload</a>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <a href="#"
                                                                onclick="show_note('{{ $item->filekelana[0]->id }}')"
                                                                class="btn btn-danger">Catatan</a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-danger" id="{{ $item->id }}Error"></span>
                                            <div class="input-group mb-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="{{ $item->id }}">
                                                    <label class="custom-file-label" id="label{{ $item->id }}"
                                                        for="{{ $item->id }}">{{ $loop->iteration . '. ' . $item->judul }}
                                                    </label>
                                                </div>
                                                <div class="input-group-append">

                                                    <a href="#" class="btn btn-info upload"
                                                        data-nama="{{ $loop->iteration . '. ' . $item->judul }}"
                                                        data-default="{{ $item->id }}">Upload</a>
                                                </div>

                                            </div>
                                    </div>
                                @endif
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="notemodal" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="position-relative p-3 bg-white" style="height: 180px">
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                            Catatan
                        </div>
                    </div>
                    <div id="note"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('java')
    <script src="{{ asset('asset') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.upload').on('click', function(e) {
                input_id = $(this).attr('data-default');
                nama = $(this).attr('data-nama');

                var file = $('#' + input_id)[0].files;
                var fd = new FormData();
                if (typeof file[0] != "undefined") {
                    fd.append('file', file[0]);
                }
                fd.append('kelana_id', input_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ url('kelana') }}",
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',

                    success: function(data) {
                        $('#' + input_id).removeClass('is-invalid');
                        $('#' + input_id + 'Error').addClass('d-none');
                        $('#content' + input_id).html(`
                            <div class="input-group mb-2">
                                <div class="custom-file">
                                    <label
                                        class="custom-file-labelnya">` + nama + `
                                    </label>
                                </div>
                                <div class="input-group-append">
                                    <a href="#" class="btn btn-warning">Verifikasi</a>
                                </div>
                            </div>
                        `);

                    },
                    error: function(data) {

                        var errors = data.responseJSON;
                        if ($.isEmptyObject(errors) == false) {
                            $.each(errors.errors, function(key, value) {
                                var ErrorID = '#' + input_id + 'Error';
                                var InputID = '#' + input_id;
                                $(InputID).addClass("is-invalid");
                                $(ErrorID).removeClass("d-none");
                                $(ErrorID).text(value);
                            })
                        }
                    }
                });
            });
        });

        function show_note(id) {
            $.ajax({
                type: "GET",
                url: "{{ url('show_note') }}/" + id,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data) {


                    $('#note').html(`                   
                            <div class="form-group">
                                <label for="title">Catatan  :</label>
                                <div class="ml-4" name="title" id="title">` + data.pencarian_data.ket + `</div>
                                </div>
                            </div>
                        `);


                    $("#notemodal").modal('show');
                },
                error: function(data) {}
            });

        }


        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
