<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleViewers extends Model
{
    protected $fillable = [
        'ip',
        'article_id'
    ];

    public $timestmaps = false;
}
