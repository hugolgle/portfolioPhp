<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

