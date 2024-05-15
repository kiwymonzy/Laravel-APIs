<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks'; // Adjust based on your actual table name

    protected $fillable = ['name', 'description', 'project_id', 'staff_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}

