<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'fa_name',
        'en_name',
        'fa_description',
        'en_description',
        'logo'
    ];
}
