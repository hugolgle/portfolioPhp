<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]

class Devis extends Model
{
    use HasFactory;

    protected $fillable = [
        'services',
        'client_name',
        'client_phone',
        'client_email',
    ];

    protected $casts = [
        'services' => 'array',
    ];
}
