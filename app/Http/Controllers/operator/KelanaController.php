<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\Filekelana;
use App\Models\Kelana;
use App\Traits\PesanError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelanaController extends Controller
{
    use PesanError;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kondisi = ['filekelana' => function ($query) {
            $query->where('kecamatan_id', auth()->user()->desa_id);
        }];
        $data['kelana'] = Kelana::withCount($kondisi)->with($kondisi)->where('tahun_id', tahun_aktif())->get();
        // dd($data['kelana']);
        return view('operator.conten.v_kelana', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function note($id)
    {
        $pencarian_data = Filekelana::find($id);
        return response()->json(['pencarian_data' => $pencarian_data, 'catatan' => $pencarian_data['ket']]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:pdf,docx,doc,rar,zip,',
        ], $this->isipesan_uploadfile());
        $file = $request->file('file');
        $file_name =  time() . "." . $request->file('file')->getClientOriginalExtension();
        $file->storeAs('data/kelana/', $file_name);
        $kelana_id = Filekelana::where([['kecamatan_id', auth()->user()->desa_id], ['kelana_id', $request->kelana_id]])->first();
        $id = $kelana_id->id ?? '';
        if ($id != '') {

            Storage::delete('data/kelana/' . $kelana_id->file);
        }

        $save = [
            'kecamatan_id' => auth()->user()->desa_id,
            'tahun_id' => tahun_aktif(),
            'kelana_id' => $request->kelana_id,
            'file' => $file_name,
            'status' => 0,
            'ket' => null,
        ];
        Filekelana::updateOrCreate(['id' => $id], $save);
        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
