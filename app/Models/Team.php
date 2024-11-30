<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected function createdAt(): Attribute   
    {
        return Attribute::make(
            fn (string $value) => Carbon::parse($value)->format('Y-m-d')
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function members(){
        return $this->hasMany(User::class, 'team_id','id');
    }

    public function projects(){
        return $this->hasMany(Project::class, 'team_id','id');
    }
}
