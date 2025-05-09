<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
