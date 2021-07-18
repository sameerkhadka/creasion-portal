<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    public function inventories(){
        return $this->belongsToMany(Inventory::class)->withPivot('quantity','unit');
    }

    public function institution(){
        return $this->belongsTo(Institution::class)->with(['district','province','localLevel','institutionType']);
    }

    public function individual(){
        return $this->belongsTo(Individual::class)->with(['district','province','localLevel']);
    }

    public function userRequest(){
        return $this->belongsTo(UserRequest::class)->select(['id'])->with('projects');
    }



}
