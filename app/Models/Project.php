<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $casts = [
    'skills' => 'array',
    'ressource' => 'array',
    'tags' => 'array',
  ];

  protected $fillable = [
    'formation',
    'title',
    'objectif',
    'description',
    'skills',
    'ressource',
    'tags',
    'image',
  ];
}
