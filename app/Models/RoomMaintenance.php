<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomMaintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'status',
        'scheduled_date',
        'notes',
    ];

    /**
     * Relasi many-to-many dengan Item
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_room_maintenance');
    }

    /**
     * Relasi ke model Room
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
