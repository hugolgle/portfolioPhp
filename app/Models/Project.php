<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]

class Project extends Model
{
    protected $casts = [
    'tags' => 'array',
    ];

    protected $fillable = [
    'title',
    'description',
    'ressource',
    'demo',
    'tags',
    'image',
    ];
}
