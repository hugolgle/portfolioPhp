<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  protected $fillable = [
    'cv',
    'bio',
    'photo',
    'numero',
    'email',
    'localisation'
  ];
}
