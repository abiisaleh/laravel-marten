<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cafe extends Model implements HasName
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'kecamatan', 'kelurahan', 'k_suasana', 'k_variasi_menu', 'k_fasilitas', 'k_pelayanan', 'k_lokasi', 'gambar'];

    public function menu(): HasMany
    {
        return $this->hasMany(menu::class);
    }

    public function members(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function getFilamentName(): string
    {
        return "{$this->nama} {$this->subscription_plan}";
    }
}
