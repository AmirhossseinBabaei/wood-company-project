<?php

namespace Modules\Gallery\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

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
