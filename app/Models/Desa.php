<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function filedekela()
    {
        return $this->hasMany(Filedekela::class);
    }
}
