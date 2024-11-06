<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HousekeepingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'scheduled_date',
        'area',
        'status',
        'notes',
    ];

    // Menambahkan relasi ke Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
