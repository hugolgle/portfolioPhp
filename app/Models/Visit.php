<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]

class Visit extends Model
{
    protected $fillable = ['path', 'ip'];
}
