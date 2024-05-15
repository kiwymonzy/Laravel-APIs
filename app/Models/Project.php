<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects'; // Adjust based on your actual table name

    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}