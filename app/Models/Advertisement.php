<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'user_id', 'title', 'ad_date', 'ad_time', 'contact', 'details', 'duration',
        'image', 'video', 'billboard', 'online'
    ];
}
