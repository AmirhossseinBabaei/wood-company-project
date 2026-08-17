<?php

declare(strict_types=1);

namespace Modules\Settings\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'fa_website_name',
        'en_website_name',
        'fa_website_description',
        'en_website_description',
        'logo_src',
        'favicon',
        'footer_logo',
        'email',
        'phone',
        'mobile',
        'fa_address',
        'en_address',
        'instagram',
        'telegram',
        'linkedin',
        'whatsapp',
        'fa_owner_full_name',
        'fa_owner_bio',
        'fa_hero_title',
        'en_owner_full_name',
        'en_owner_bio',
        'en_hero_title',
        'owner_avatar'
    ];
}
