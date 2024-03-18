<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
    public function user()
    {
        return $this->hasOne(User::class, 'desa_id');
    }
    public function filekelana()
    {
        return $this->hasMany(Filekelana::class);
    }
}
