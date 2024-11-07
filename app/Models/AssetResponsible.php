<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetResponsible extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'position',
        'contact_info',
    ];

    /**
     * Relasi ke model Department
     * Setiap penanggung jawab terkait dengan satu departemen
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
