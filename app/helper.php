<?php

use App\Models\Tahun;

function tahun_aktif()
{
    $tahun = Tahun::where('status', '1')->first();
    return $tahun->id;
}
function nama_tahun()
{
    $tahun = Tahun::where('status', '1')->first();
    return $tahun->tahun;
}
