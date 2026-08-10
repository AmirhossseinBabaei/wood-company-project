<?php

namespace Modules\Slider\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'fa_title',
        'en_title',
        'fa_slug',
        'en_slug',
        'image'
    ];

    /**
     * @return string
     */
    public function persianCreatedAt(): string
    {
        return verta($this->created_at)->format('Y-m-d');
    }
}
