@extends('admin.layout.main')

@section('title', 'Rekap Data Kelana')
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
    </style>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
<script src="{{ asset('asset') }}/grafik/js/Chart.js"></script>

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <section class="content">
        <div class="container-fluid">
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Rekap Data Kelana</legend>
                <div class="col-12 my-2">
                    <div class="card">
                        <h2 class="card-title mx-auto font-weight-bold mt-">PROGRES PENGUMPULAN DATA KELANA</h2>
                        <h2 class="card-title mx-auto font-weight-bold">KABUPATEN PONOROGO</h2>
                        <h2 class="card-title mx-auto">Data Per Kecamatan</h2>
                        <div class="card-header ">
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-head-fixed table-bordered table-hover text-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" style="width: 5%;">No</th>
                                        <th class="text-center align-middle" style="width: 30%;">Perangkat Daerah</th>
                                        <th class="text-center align-middle">Progres Pengumpulan Data
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kecamatan as $item)
                                        <?php
                                        $progress = round(($item->filekelana_count / $jml_kelana) * 100);
                                        if ($progress < 50) {
                                            $warna = 'bg-danger';
                                        } elseif ($progress < 70) {
                                            $warna = 'bg-warning';
                                        } elseif ($progress < 80) {
                                            $warna = 'bg-info';
                                        } elseif ($progress > 79) {
                                            $warna = 'bg-blue';
                                        }
                                        
                                        ?>
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td><a href="{{ url('rekap_kelana/' . $item->id) }}">Kecamatan
                                                    {{ $item->title }}</a></td>
                                            <td>
                                                <div class="progress progress-md">
                                                    <div class="progress-bar {{ $warna }}"
                                                        style="width: {{ $progress }}%">
                                                        <span
                                                            class="font-weight-bold">{{ $item->filekelana_count }}/{{ $jml_kelana }}
                                                            ({{ $progress }}%)
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </fieldset>
        </div>
    </section>
@endsection
@push('java')
    <script src="{{ asset('asset') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#example1").DataTable({
                "ordering": false,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["excel", "pdf"],
                "lengthMenu": [
                    [15, 25, 50, -1],
                    [15, 25, 50, "All"]
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td_no = tr[i].getElementsByTagName("td")[0];
                td_name = tr[i].getElementsByTagName("td")[1];
                if (td_no || td_name) {
                    txtValue_no = td_no.textContent || td_no.innerText;
                    txtValue_name = td_name.textContent || td_name.innerText;
                    console.log(txtValue_no.toUpperCase().indexOf(filter));
                    if (txtValue_no.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Initialize Select2 Elements
            $(".select2bs4").select2({
                theme: "bootstrap4",
            });
        });
    </script>
@endpush
