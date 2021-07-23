<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Partner;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        $projects = Project::all();
        $partners = Partner::orderBy('order')->get();
        return view('map.index',compact('projects','partners'));
    }
}
