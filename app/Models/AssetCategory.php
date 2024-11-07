<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi ke model Asset
     * Setiap kategori dapat memiliki banyak aset
     */
    // public function assets()
    // {
    //     return $this->hasMany(Asset::class);
    // }
}
