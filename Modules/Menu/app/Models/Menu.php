<?php

declare(strict_types=1);

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    //position menu constraint variables
    public const HEADER = 'header';
    public const FOOTER = 'footer';

    //status menu constraint variables
    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'parent_id',
        'fa_title',
        'en_title',
        'fa_url',
        'en_url',
        'sort_order',
        'position',
        'status'
    ];

    public function parent()
    {
        return $this->belongsTo(\App\Models\Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }


    /**
     * @param $query
     * @return Builder
     */
    public function scopeHeaderMenus($query): Builder
    {
        return $query->where('position', (self::HEADER))
            ->where('status', self::ACTIVE);
    }


    /**
     * @param $query
     * @return Builder
     */
    public function scopeFooterMenus($query): Builder
    {
        return $query->where('position', (self::FOOTER))
            ->where('status', self::ACTIVE);
    }
}
