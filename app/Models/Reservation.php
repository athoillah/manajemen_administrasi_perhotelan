<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'room_id',
        'check_in',
        'check_out',
    ];

    // Relasi dengan Guest
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    // Relasi dengan Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
