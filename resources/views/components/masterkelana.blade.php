<div>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">DATA KELANA</legend>
        <div class="card-body p-0 mb-2 mt-1">
            <div class="row">
                <div class="col-md-7 mb-2">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-kecamatan">
                        <i class="mdi mdi-plus"></i> Tambah Data</button>

                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>

                            <th class="text-center px-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @foreach ($data as $d)
                            <tr id="tr-{{ $d->id }}">
                                <td class="td py-0 my-0">
                                    <input id="{{ $d->id }}" type="text" value="{{ $d->judul }}"
                                        class="form-control form-control-under border-0 ml-0" style="font-size:14px"
                                        autocomplete="off">
                                </td>
                                <td class="text-center px-1">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-secondary delete-button-kelana"
                                            data-quantity="{{ $d->id }}">
                                            <i class="ri-delete-bin-line px-1"></i>
                                        </button>

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
