<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function assigner(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function assignee(){
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
