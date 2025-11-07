<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaborator extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'logo_path',
        'banner_path',
        'description',
        'website',
        'contact_name',
        'contact_email',
        'verified',
        'social_links',
        'address',
        'metadata',
    ];

    protected $casts = [
        'social_links' => 'array',
        'metadata' => 'array',
        'verified' => 'boolean',
    ];

    // Relationships
    public function programs()
    {
        return $this->belongsToMany(Program::class)
                    ->withPivot(['role','contribution_amount','contribution_type','visibility','impact_note'])
                    ->withTimestamps();
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class)
                    ->withPivot(['role','contribution_amount','contribution_type','visibility','impact_note'])
                    ->withTimestamps();
    }
}
