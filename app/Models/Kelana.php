<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelana extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];
    public function filekelana()
    {
        return $this->hasMany(Filekelana::class);
    }
    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}
