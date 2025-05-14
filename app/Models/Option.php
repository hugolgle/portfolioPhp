<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'option_service');
    }
}
