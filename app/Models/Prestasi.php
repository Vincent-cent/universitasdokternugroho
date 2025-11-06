<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumni_id',
        'title',
        'description',
        'image'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}