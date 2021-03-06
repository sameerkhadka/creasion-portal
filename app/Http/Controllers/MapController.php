<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Partner;
use App\Models\CovidResource;
use App\Models\Faq;
use App\Models\LinkCategory;
use App\Models\Response;
use App\Models\ProvinceChart;
use App\Models\InstitutionChart;
use Illuminate\Http\Request;



class MapController extends Controller
{
    public function faqs(){
        $items = Faq::orderBy('order', 'ASC')->get();
        return view('faqs',compact('items'));
    }

    public function covidResources(){
        $items = CovidResource::orderBy('order', 'ASC')->get();
        return view('covid-19-resources',compact('items'));
    }

    public function importantLinks(){
        $items = LinkCategory::all();
        return view('important-links',compact('items'));
    }

    public function ofnChapters(){
        return view('ofn-chapters');
    }

    public function successStories(){
        return view('success-stories');
    }


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
            $genderData[1]['z'] = 40;
        }

        $result = ProvinceChart::orderBy('order')->get();
        $data = [];
        $value = [];
        foreach($result as $val){
            array_push($data,$val->name);
            array_push($value,$val->value);
       }
       $provinceName = $data;
       $values = array_map('floatval', $value);


       $all = InstitutionChart::orderBy('order')->get();
       foreach($all as $item)
       {
           $institutionchart[] = [
                "name" => $item->name,
                "y" => floatval($item->value)
           ];
       }

        $projects = Project::all();
        $partners = Partner::orderBy('order')->get();

        return view('map.index',compact('projects','partners', 'genderData','provinceName','values','institutionchart'));
    }
}
