<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'quantity',
        'unit',
        'last_restocked',
    ];

    /**
     * Relasi ke model InventoryCategory
     */
    public function category()
    {
        return $this->belongsTo(InventoryCategory::class);
    }
}
