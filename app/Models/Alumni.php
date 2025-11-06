<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'angkatan',
        'year_range',
        'photo',
        'work_main',
        'work_main_address',
        'work_secondary',
        'work_secondary_desc',
        'about'
    ];

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    public function prestasis()
    {
        return $this->hasMany(Prestasi::class);
    }
}