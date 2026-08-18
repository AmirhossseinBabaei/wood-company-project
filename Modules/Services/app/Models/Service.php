<?php

declare(strict_types=1);

namespace Modules\Services\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'fa_title',
        'en_title',
        'image',
        'fa_description',
        'en_description'
    ];

    /**
     * @return string
     */
    public function persianCreatedAt(): string
    {
        return verta($this->created_at)->format('Y-m-d');
    }
}
