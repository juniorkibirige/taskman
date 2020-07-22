<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description'];

    // Relationship between Project and Tasks One -> Many

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
