<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]
class About extends Model
{
    protected $fillable = [
        'cv',
        'herotext',
        'bio',
        'photo',
        'numero',
        'email',
        'localisation'
    ];
}
