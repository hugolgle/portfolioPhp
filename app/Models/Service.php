<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'description', 'price'];

  public function options()
  {
    return $this->belongsToMany(Option::class, 'option_service');
  }
}

