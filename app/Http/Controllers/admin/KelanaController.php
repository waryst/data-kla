<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dekela;
use App\Models\Kelana;
use Illuminate\Http\Request;

class KelanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.content.kelana');
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
        $request->validate([
            'title' => 'required',
        ]);
        $input = $request->all();
        if ($input['tipe'] == "kelana") {
            Kelana::create(['judul' => $input['title'], 'tahun_id' => tahun_aktif()]);
            return response()->json([
                'success' => true,
                'type' => 'success',
                'message' => 'Dapil berhasil ditambahkan',
            ]);
        } elseif ($input['tipe'] == "dekela") {
            Dekela::create(['judul' => $input['title'], 'tahun_id' => tahun_aktif()]);
            return response()->json([
                'success' => true,
                'type' => 'success',
                'message' => 'Dapil berhasil ditambahkan',
            ]);
        }

        return response()->json([
            'success' => false,
            'type' => 'error',
            'message' => 'Gagal, dapil sudah ada',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
        $request->validate([
            'title' => 'required',
        ]);
        $input = $request->all();
        if ($input['tipe'] == "kelana") {
            Kelana::where('id', $id,)
                ->update(['judul' => $input['title']]);
            return response()->json([
                'success' => true,
                'type' => 'success'
            ]);
        } elseif ($input['tipe'] == "dekela") {
            Dekela::where('id', $id,)
                ->update(['judul' => $input['title']]);
            return response()->json([
                'success' => true,
                'type' => 'success'
            ]);
        }

        return response()->json([
            'success' => false,
            'type' => 'error',
            'message' => 'Gagal, dapil sudah ada',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kelana = Kelana::where('id', $id)->count();
        if ($kelana > 0) {
            $kelana = Kelana::where('id', $id)->first();
            $kelana->delete();
        } else {
            $dekela = Dekela::where('id', $id)->first();
            $dekela->delete();
        }
        return response()->json([
            'status' => true,
            'type' => 'success'
        ]);
    }
}
