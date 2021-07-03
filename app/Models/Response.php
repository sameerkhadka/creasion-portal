<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $appends = ['coordinates','project'];
    public function inventories(){
        return $this->belongsToMany(Inventory::class)->withPivot('quantity');
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function individual(){
        return $this->belongsTo(Individual::class);
    }

    public function userRequest(){
        return $this->belongsTo(UserRequest::class)->select(['id','project_id'])->with('project');
    }
    public function getCoordinatesAttribute()
    {
        return $this->individual->coordinates;
    }
    public function getProjectAttribute()
    {
        return $this->userRequest->project;
    }


}
