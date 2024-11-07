<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'serial_number',
        'value',
        'purchase_date',
        'condition',
    ];

    /**
     * Relasi ke model AssetCategory
     * Setiap aset memiliki satu kategori
     */
    public function category()
    {
        return $this->belongsTo(AssetCategory::class);
    }
}
