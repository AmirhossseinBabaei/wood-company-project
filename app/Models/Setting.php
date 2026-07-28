<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'fa_website_name',
        'fa_website_name',
        'en_website_description',
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
    ];
}
