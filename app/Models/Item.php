<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi ke RoomMaintenance
     *
     * Setiap item bisa digunakan dalam beberapa jadwal pemeliharaan
     */
    public function maintenances()
    {
        return $this->belongsToMany(RoomMaintenance::class, 'item_room_maintenance');
    }
}
