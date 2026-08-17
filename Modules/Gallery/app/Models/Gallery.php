<?php

namespace Modules\Gallery\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    //active constraint variable
    public const ACTIVE = 'active';
    //inactive constraint variable
    public const INACTIVE = 'inactive';

    protected $fillable = [
        'fa_title',
        'en_title',
        'fa_description',
        'en_description',
        'sort_order',
        'image',
        'status'
    ];

    /**
     * @param $query
     * @return $this
     */
    public function scopeActiveGalleries($query): static
    {
        $query->where('status', self::ACTIVE);

        return $this;
    }
}
