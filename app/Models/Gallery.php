<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'fa_title',
        'en_title',
        'fa_description',
        'en_description',
        'sort_order',
        'image',
        'status'
    ];
}
