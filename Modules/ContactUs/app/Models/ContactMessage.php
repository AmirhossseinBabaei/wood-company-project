<?php

namespace Modules\ContactUs\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $table = "contact_us_messages";

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'message',
        'is_read'
    ];
}
