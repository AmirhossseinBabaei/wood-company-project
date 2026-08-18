<?php

declare(strict_types=1);

namespace Modules\ContactUs\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    protected $table = 'team_members';

    //Team member status constraint variables
    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    protected $fillable = [
        'full_name',
        'status',
        'field',
        'image'
    ];

    /**
     * @param $query
     * @return Builder
     */
    public function scopeActiveMembers($query): Builder
    {
        return $query->where('status', self::ACTIVE);
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopeInActiveMembers($query): Builder
    {
        return $query->where('status', self::INACTIVE);
    }
}
