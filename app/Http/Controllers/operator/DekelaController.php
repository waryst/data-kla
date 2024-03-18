<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\Dekela;
use App\Models\Filedekela;
use App\Traits\PesanError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DekelaController extends Controller
{
    use PesanError;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kondisi = ['filedekela' => function ($query) {
            $query->where('desa_id', auth()->user()->desa_id);
        }];
        $data['dekela'] = Dekela::withCount($kondisi)->with($kondisi)->where('tahun_id', tahun_aktif())->get();
        // dd($data['dekela']);
        return view('operator.conten.v_dekela', $data);
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
        $pencarian_data = Filedekela::find($id);
        return response()->json(['pencarian_data' => $pencarian_data, 'catatan' => $pencarian_data['ket']]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:pdf',
        ], $this->isipesan_uploadfile());
        $file = $request->file('file');
        $file_name =  time() . "." . $request->file('file')->getClientOriginalExtension();
        $file->storeAs('data/dekela/', $file_name);
        $dekela_id = Filedekela::where([['desa_id', auth()->user()->desa_id], ['dekela_id', $request->dekela_id]])->first();
        $id = $dekela_id->id ?? '';
        if ($id != '') {

            Storage::delete('data/dekela/' . $dekela_id->file);
        }

        $save = [
            'desa_id' => auth()->user()->desa_id,
            'tahun_id' => tahun_aktif(),
            'dekela_id' => $request->dekela_id,
            'file' => $file_name,
            'status' => 0,
            'ket' => null,
        ];
        Filedekela::updateOrCreate(['id' => $id], $save);
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
