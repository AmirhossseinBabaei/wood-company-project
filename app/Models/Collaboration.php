<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    protected $fillable = [
        'fa_title',
        'fa_description',
        'en_title',
        'en_description',
        'image'
    ];
}
