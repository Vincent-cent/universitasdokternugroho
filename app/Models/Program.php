<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_summary',
        'description',
        'vision_goals',
        'category',
        'logo_path',
        'hero_image_path',
        'lead_contact_name',
        'lead_contact_email',
        'status',
        'start_date',
        'end_date',
        'budget_amount',
        'public',
        'created_by',
        'metadata'
    ];

    protected $casts = [
        'vision_goals' => 'array',
        'metadata' => 'array',
        'public' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'budget_amount' => 'decimal:2',
    ];

     public function activities()
    {
         return $this->hasMany(Activity::class);
     }

    public function collaborators()
     {
         return $this->belongsToMany(Collaborator::class)
                     ->withPivot(['role', 'visibility', 'impact_note'])
                     ->withTimestamps();
     }
}
