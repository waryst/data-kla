<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filekelana extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];
    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
    public function kelana()
    {
        return $this->belongsTo(Kelana::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
