<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

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
