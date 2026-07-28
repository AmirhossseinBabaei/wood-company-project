<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'article_category_id',
        'image',
        'fa_title',
        'fa_summery',
        'fa_content',
        'en_title',
        'en_summery',
        'en_content',
        'status',
        'view_count'
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
