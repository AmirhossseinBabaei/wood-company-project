<?php

namespace Modules\ContactUs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\ContactUs\Database\Factories\TeamMemberFactory;

class TeamMember extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TeamMemberFactory
    // {
    //     // return TeamMemberFactory::new();
    // }
}
