<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Partner;
use App\Models\Response;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        $genderData = [
            [
            'name' => 'Male',
            'y'=> 0,
            'z'=> 40,
            ],
            [
            'name' => 'Female',
            'y'=> 0,
            'z'=> 50,
            ]
        ];
        $response = Response::where('individual_id','!=',null)->with(['individual','userRequest'])->get();
        $genderData[0]['y'] = $response->where('individual.gender','Male')->count();
        $genderData[1]['y'] = $response->where('individual.gender','Female')->count();
        if($genderData[0]['y'] > $genderData[1]['y'] ){
            $genderData[0]['z'] = 50;
            $genderData[0]['z'] = 40;
        }
        $projects = Project::all();
        $partners = Partner::orderBy('order')->get();
        return view('map.index',compact('projects','partners', 'genderData'));
    }
}
