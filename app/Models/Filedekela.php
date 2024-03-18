<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filedekela extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];
    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
    public function dekela()
    {
        return $this->belongsTo(Dekela::class);
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
