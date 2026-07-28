<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'fa_title',
        'en_title',
        'image',
        'from_date',
        'to_date',
        'fa_location',
        'en_location'
    ];
}
