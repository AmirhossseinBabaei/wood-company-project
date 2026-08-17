<?php

declare(strict_types=1);

namespace Modules\Project\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'img_src',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
