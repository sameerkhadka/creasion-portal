<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;
    public function individual()
    {
        return $this->belongsTo(Individual::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
