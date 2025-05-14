<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]
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
