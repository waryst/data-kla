<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dekela extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];
    public function filedekela()
    {
        return $this->hasMany(Filedekela::class);
    }
    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}
