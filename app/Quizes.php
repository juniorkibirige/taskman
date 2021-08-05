<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizes extends Model
{
    protected $table = 'mci_quiz';

    protected $fillable = [
        'user_id',
        'quiz_id',
        'total',
        'quiz_solutions',
        'app_id'
    ];
}
