@extends('operator.layout.main')

@section('title', 'Calon Bupati ')
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
                    <h3 class="card-title">Entry Data DEKELA</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="card px-2 col-md-5 ">
                            <label>Lampiran Berkas </label>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="surat_laporan_polisi"
                                        id="surat_laporan_polisi">
                                    <label class="custom-file-label" for="surat_laporan_polisi"> 1. Surat Laporan
                                        Kehilangan dari
                                        Kepolisian </label>
                                    <span class="text-danger" id="surat_laporan_polisiError"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="raport" id="raport">
                                    <label class="custom-file-label" for="raport"> 2. Scan Raport Asli </label>
                                    <span class="text-danger" id="raportError"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="ijazah" id="ijazah">
                                    <label class="custom-file-label" for="ijazah"> 3. Scan Foto Copy Ijazah </label>
                                    <span class="text-danger" id="ijazahError"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="buku_induk" id="buku_induk">
                                    <label class="custom-file-label" for="buku_induk"> 4. Scan Buku Induk Asli </label>
                                    <span class="text-danger" id="buku_indukError"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="akte" id="akte">
                                    <label class="custom-file-label" for="akte"> 5. Scan Akte Kelahiran Asli </label>
                                    <span class="text-danger" id="akteError"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="permohonan_kepsek"
                                        id="permohonan_kepsek">
                                    <label class="custom-file-label" for="permohonan_kepsek"> 6. Surat Permohonan Kepala
                                        Sekolah
                                        Asli </label>
                                    <span class="text-danger" id="permohonan_kepsekError"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="pernyataan_mutlak"
                                        id="pernyataan_mutlak">
                                    <label class="custom-file-label" for="pernyataan_mutlak"> 7. Surat Pernyataan Tanggung
                                        Jawab
                                        Mutlak </label>
                                    <span class="text-danger" id="pernyataan_mutlakError"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file" name="pernyataan_saksi" id="pernyataan_saksi">
                                    <label class="custom-file-label" for="pernyataan_saksi"> 8. Surat Pernyataan Dua Orang
                                        Saksi
                                    </label>
                                    <span class="text-danger" id="pernyataan_saksiError"></span>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                    <div class="col-12">
                        <button type="button" id="submit" value="Submit"
                            class="btn btn-sm bg-gradient-primary float-md-left button-simpan">Simpan</button>
                        <button class="btn btn-sm bg-gradient-primary float-md-left loading-simpan">
                            <div class="spinner">
                                <i role="status" class="spinner-border spinner-border-sm">
                                </i>
                                Simpan
                            </div>
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </section>
    </section>
@endsection
