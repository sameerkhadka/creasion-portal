<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    public function link_categories(){
        return $this->belongsTo(LinkCategory::class,'link_categories_id');
    }
}
