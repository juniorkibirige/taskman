<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppVersion extends Model
{
    protected $table = "app_versions";
    protected $primaryKey = "app_id";

    protected $fillable = [
        "app_id",
        "android",
        "ios"
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
