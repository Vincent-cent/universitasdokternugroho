<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_id',
        'title',
        'slug',
        'summary',
        'description',
        'location',
        'start_date',
        'end_date',
        'status',
        'hero_image_path',
        'gallery',
        'impact_metrics',
        'public',
        'visibility',
        'created_by'
    ];

    protected $casts = [
        'gallery' => 'array',
        'impact_metrics' => 'array',
        'public' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function collaborators()
    {
        return $this->belongsToMany(Collaborator::class)
                    ->withPivot(['role','visibility','impact_note'])
                    ->withTimestamps();
    }
}
