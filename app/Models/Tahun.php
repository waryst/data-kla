<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];
    public function kelana()
    {
        return $this->hasMany(Kelana::class);
    }
}
