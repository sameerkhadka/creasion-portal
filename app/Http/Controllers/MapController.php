<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Partner;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        $genderData = [
            [
                'name' => 'Male',
                'y'=> 90,
                'z'=> 40,
            ],
            [
            'name' => 'Female',
            'y'=> 90,
            'z'=> 40,
            ]
        ];
        $projects = Project::all();
        $partners = Partner::orderBy('order')->get();
        return view('map.index',compact('projects','partners', 'genderData'));
    }
}
