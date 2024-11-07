<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi (fillable) melalui form atau request
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi ke model Employee
     * Setiap departemen dapat memiliki banyak karyawan
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Relasi ke model Asset atau model lain yang memerlukan referensi ke departemen
     */
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
