<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dekela;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class RekapdekelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jml_dekela = Dekela::where('tahun_id', tahun_aktif())->count();
        $kirim['jml_dekela'] = Dekela::where('tahun_id', tahun_aktif())->count();

        $kondisi = ['desa' => function ($query) use ($jml_dekela) {
            $query->withcount(['filedekela' => function ($query) use ($jml_dekela) {
                $query->where([['tahun_id', tahun_aktif()],  ['status', 1]]);
            }])->having('filedekela_count', $jml_dekela);
        }];

        $kirim['kecamatan'] = Kecamatan::with($kondisi)->withcount('desa')->orderBy('title', 'ASC')->get();
        return view('admin.content.v_rekapdekela', $kirim);
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
        $kondisi = ['filedekela' => function ($query) {
            $query->where([['tahun_id', tahun_aktif()], ['status', 1]]);
        }];
        $kirim['desa'] = Desa::withcount($kondisi)->where('kecamatan_id', $id)->orderBy('title', 'ASC')->get();
        $kirim['jml_dekela'] = Dekela::where('tahun_id', tahun_aktif())->count();
        $kirim['kecamatan'] = Kecamatan::where('id', $id)->first();
        return view('admin.content.v_rekapdekeladesa', $kirim);
    }
    public function detail_dekela(string $id)
    {
        $kondisi = ['filedekela' => function ($query) use ($id) {
            $query->where([['tahun_id', tahun_aktif()],  ['desa_id', $id]]);
        }];
        $kirim['data_dekela'] = Dekela::with($kondisi)->where('tahun_id', tahun_aktif())->get();
        $kirim['desa'] = Desa::where('id', $id)->first();
        return view('admin.content.v_detailrekapdekela', $kirim);
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
