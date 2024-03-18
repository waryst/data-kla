<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Filedekela;
use App\Models\Filekelana;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kirim['data_kelana'] = Filekelana::with('kecamatan', 'kelana')->where([['status', 0]])->get();
        $kirim['data_dekela'] = Filedekela::with('desa', 'dekela')->where([['status', 0]])->get();
        // dd($kirim['data_dekela']);
        return view('admin.content.verifikasi', $kirim);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $cek = Filekelana::where([['id', $id]])->count();
        if ($cek > 0) {
            $data = Filekelana::with('kecamatan', 'kelana')->where('id', $id)->first();
            $pd = $data->kecamatan->title;
            $judul = $data->kelana->judul;
            $ket = "Kecamatan";
        } else {
            $data = Filedekela::with('desa', 'dekela')->where('id', $id)->first();
            $pd = $data->desa->title;
            $judul = $data->dekela->judul;
            $ket = "Desa";
        }
        return response()->json(['data' => $data, 'ket' => $ket, 'pd' => $pd, 'judul' => $judul]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cek = Filekelana::where([['id', $id]])->count();
        if ($cek > 0) {
            if ($request->status == 1) {
                Filekelana::where('id', $id)->update([
                    'status' => 1,
                    'ket' => null
                ]);
                return redirect('/verifikasi');
            } else {
                Filekelana::where('id', $id)->update([
                    'status' => 2,
                    'ket' => $request->catatan
                ]);
                return redirect('/verifikasi');
            }
        } else {
            if ($request->status == 1) {
                Filedekela::where('id', $id)->update([
                    'status' => 1,
                    'ket' => null
                ]);
                return redirect('/verifikasi');
            } else {
                Filedekela::where('id', $id)->update([
                    'status' => 2,
                    'ket' => $request->catatan
                ]);
                return redirect('/verifikasi');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
