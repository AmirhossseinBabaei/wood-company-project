<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'fa_name',
        'en_name',
        'image',
        'catalog_file',
        'en_description',
        'fa_description',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(
            Package::class,
            'product_packages',
            'product_id',
            'package_id'
        );
    }
}
