<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]

class Preference extends Model
{
    protected $fillable = ['site_title', 'site_description', 'favicon', 'seo_keywords'];
}
