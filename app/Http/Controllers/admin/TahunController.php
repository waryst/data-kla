<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelana;
use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();
        return view('admin.content.tahun', compact('tahun'));
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
        if (Tahun::where('tahun', $input['title'])->count() == 0) {
            Tahun::create(['tahun' => $input['title'], 'status' => 0]);
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
        Tahun::query()->update(
            ['status' => 0]
        );
        Tahun::updateOrCreate(
            ['id' => $id],
            ['status' => 1]
        );
        $tahun = Tahun::orderBy('tahun', 'ASC')->get();

        return view('admin.content.tahun', compact('tahun'));
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
        if (Tahun::where('tahun', $input['title'])->count() == 0) {
            Tahun::where('id', $id,)
                ->update(['tahun' => $input['title']]);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
