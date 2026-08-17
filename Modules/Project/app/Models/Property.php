<?php

declare(strict_types=1);

namespace Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'fa_name',
        'en_name',
        'fa_value',
        'en_value'
    ];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'project_property', 'property_id', 'project_id');
    }

    /**
     * @param int $projectId
     * @return ProjectProperty
     */
    public function projectProperty(int $projectId): ProjectProperty
    {
        return $this->hasOne(ProjectProperty::class, 'property_id')
            ->where('project_id', $projectId)
            ->first();
    }
}
