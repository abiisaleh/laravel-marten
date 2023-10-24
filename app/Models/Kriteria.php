<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nama', 'bobot', 'utility'];

    public function subkriteria()
    {
        return $this->hasMany(subkriteria::class);
    }
}
