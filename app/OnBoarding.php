<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnBoarding extends Model
{
    protected $table = 'onboarding';

    protected $fillable = [
        'user_id',
        'status',
        'app_id'
    ];
}
