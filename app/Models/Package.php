<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
    protected $fillable = [
        'fa_title',
        'en_title',
        'weight'
    ];

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(
            Package::class,
            'product_packages',
            'package_id',
            'product_id'
        );
    }
}
