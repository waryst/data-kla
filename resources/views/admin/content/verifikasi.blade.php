@extends('admin.layout.main')

@section('title', 'Verifikasi Kigiatan')
@push('css')
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline p-2">
                <div class="card-header">
                    <h3 class="card-title">Verifikasi Data Kelana dan Dekela</h3>
                </div>
                <div class="card-body">
                    <table id="datatable" name="datatable" class=" table table-hover dataTable dtr-inline text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Perangkat Daerah</th>
                                <th>Judul</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data_kelana as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>Kecamatan {{ $item->kecamatan->title }}</td>
                                    <td>{{ $item->kelana->judul }}</td>
                                    <td class="text-center">

                                        <button type="button" class="btn btn-sm btn-outline-success verifikasi"
                                            data-id="{{ $item->id }}">
                                            <i class="fas fa-check"></i>
                                            Verifikasi
                                        </button>
                                        @if (substr($item->file, -3) == 'zip' or substr($item->file, -3) == 'rar')
                                            <a href="{{ url('/file/Kelana') . '/' . $item->file }}"
                                                class="btn btn-sm btn-outline-info">Cek Data
                                            </a>
                                        @elseif(substr($item->file, -3) == 'pdf')
                                            <a href="https://docs.google.com/gview?url={{ url('/file/Kelana') . '/' . $item->file }}"
                                                class="btn btn-sm btn-outline-info">Cek Data
                                            </a>
                                        @else
                                            <a href="https://view.officeapps.live.com/op/embed.aspx?src={{ url('/file/Kelana') . '/' . $item->file }}"
                                                class="btn btn-sm btn-outline-info">Cek Data
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($data_dekela as $item)
                                <tr>
                                    <td>{{ $data_kelana->count() + $loop->iteration }}</td>
                                    <td>Desa {{ $item->desa->title }}</td>
                                    <td>{{ $item->dekela->judul }}</td>
                                    <td class="text-center">

                                        <button type="button" class="btn btn-sm btn-outline-success verifikasi"
                                            data-id="{{ $item->id }}">
                                            <i class="fas fa-check"></i>
                                            Verifikasi
                                        </button>
                                        @if (substr($item->file, -3) == 'zip' or substr($item->file, -3) == 'rar')
                                            <a href="{{ url('/file/Dekela') . '/' . $item->file }}"
                                                class="btn btn-sm btn-outline-info">Cek Data
                                            </a>
                                        @elseif(substr($item->file, -3) == 'pdf')
                                            <a href="https://docs.google.com/gview?url={{ url('/file/Dekela') . '/' . $item->file }}"
                                                class="btn btn-sm btn-outline-info">Cek Data
                                            </a>
                                        @else
                                            <a href="https://view.officeapps.live.com/op/embed.aspx?src={{ url('/file/Dekela') . '/' . $item->file }}"
                                                class="btn btn-sm btn-outline-info">Cek Data
                                            </a>
                                        @endif
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_verifikasi" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="card card-success my-0">
                        <div class="card-header">
                            <h3 class="card-title">
                                Verifikasi Data
                            </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body my-0 py-0">
                            <div id="page"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('java')
    <script src="{{ asset('asset') }}/dist/js/demo.js"></script>


    <script src="{{ asset('asset') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            //edit data
            $('#page').on("click", '.ditolak', function() {
                $('#note').html(`
                    <div class="form-group">
                        <label for="description">Catatan</label>
                        <textarea rows="2" class=" form-control" name="catatan" id="catatan"></textarea>
                    </div>`);
            })
            $('#page').on("click", '.diterima', function() {
                $('#note').html(``);
            })
            $('.verifikasi').on("click", function() {
                var id = $(this).attr('data-id');

                $.ajax({
                    url: "{{ url('verifikasi') }}" + '/' + id + '/edit',
                    type: "GET",
                    dataType: "JSON",
                    success: function(hasil) {
                        $('#id').val(hasil.title);
                        $('#page').html(`
                    <form method="POST" action="{{ url('/verifikasi') }}/` + hasil.data.id + `" role="form" id="editform"
                            enctype="multipart/form-data">
                            @method('put')
                            {{ csrf_field() }} 
                    <div class="form-group mt-2">
                        <label class="my-0" for="opd">Pemerintah Daerah : </label>
                        <div class="mt-0" >` + hasil.ket + ` ` + hasil.pd + `</div>
                        <label class="my-0" for="exampleInputPassword1">Judul Data : </label>
                        <div class="mt-0" >` + hasil.judul + `</div>
                        <label class="mt-2" for="exampleInputPassword1">Status Data</label>
                        <div class="row">
                            <div class="col-8 col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input diterima" type="radio" name="status"
                                        id="flexRadioDefault1" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Disetujui
                                    </label>
                                </div>
                            </div>
                            <div class="col-4 col-sm-6">
                                <div class="form-check float-md-left">
                                    <input class="form-check-input ditolak" type="radio" name="status"
                                        id="flexRadioDefault2" value="0">
                                    <label class="form-check-label float-md-right" for="flexRadioDefault2">
                                        Ditolak
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="note"></div>
                       
                    </div>
                        <button class="btn btn-sm bg-gradient-info float-md-right my-2">
                                Verifikasi
                            </button>
                    </form>
                    `);

                        $('#modal_verifikasi').modal('show');

                    },
                    error: function(data) {}
                });
            });


        });
    </script>
    {{-- <script src="{{ asset('asset') }}/plugins/jquery/jquery.min.js"></script> --}}
@endpush
