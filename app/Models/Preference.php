<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $fillable = ['site_title', 'site_description', 'favicon', 'seo_keywords'];
}

