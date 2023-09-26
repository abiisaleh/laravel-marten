<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nama','nilai'];

    public function kriteria(){
        return $this->belongsTo(kriteria::class);
    }
}
