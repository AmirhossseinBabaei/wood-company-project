<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'fa_name',
        'en_name',
        'fa_slug',
        'en_slug',
        'image',
        'fa_description',
        'en_description'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
}