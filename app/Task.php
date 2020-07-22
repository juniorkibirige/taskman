<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'project_id'];

    // RElationship between Tasks and Projects Many -> One
    public function project() {
        return $this->hasOne(Project::class);
    }
}
