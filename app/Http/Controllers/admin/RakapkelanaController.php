<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Filekelana;
use App\Models\Kecamatan;
use App\Models\Kelana;
use Illuminate\Http\Request;

class RakapkelanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kondisi = ['filekelana' => function ($query) {
            $query->where([['tahun_id', tahun_aktif()], ['status', 1]]);
        }];
        $kirim['kecamatan'] = Kecamatan::withcount($kondisi)->orderBy('title', 'ASC')->get();
        $kirim['jml_kelana'] = Kelana::where('tahun_id', tahun_aktif())->count();
        return view('admin.content.v_rekapkelana', $kirim);
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

        $kondisi = ['filekelana' => function ($query) use ($id) {
            $query->where([['tahun_id', tahun_aktif()], ['kecamatan_id', $id]]);
        }];
        $kirim['data_kelana'] = kelana::with($kondisi)->where('tahun_id', tahun_aktif())->get();
        $kirim['kecamatan'] = Kecamatan::where('id', $id)->first();
        return view('admin.content.v_detailrekapkelana', $kirim);
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
