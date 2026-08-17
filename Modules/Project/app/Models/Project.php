<?php

declare(strict_types=1);

namespace Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'fa_name',
        'en_name',
        'fa_slug',
        'en_slug',
    ];

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'project_property', 'project_id', 'property_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    /**
     * @return string
     */
    public function persianCreatedAt(): string
    {
        return verta($this->created_at)->format('Y-m-d');
    }
}
