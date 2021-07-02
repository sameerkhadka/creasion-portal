<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InstitutionType;

use App\Models\Individual;

use App\Models\Institution;

use App\Models\Province;

use App\Models\District;

use App\Models\LocalLevel;

use App\Models\UserRequest;

class RequestController extends Controller
{
    public function index()
    {
        $province = Province::all();
        $district = District::all();
        $local = LocalLevel::all();
        $types = InstitutionType::all();
        return view('request', compact('types','province','district','local'));
    }

    public function request(Request $request)
    {
        if($request->req_type == "individual")
        { 
           $individual = new Individual();
           $individual->name = $request->name;
           $individual->gender = $request->gender;
           $individual->age = $request->age;
           $individual->province_id = $request->province_id;
           $individual->district_id = $request->district_id;
           $individual->local_level_id = $request->local_level_id;
           $individual->coordinates = $request->coordinate;
           $individual->save();

           $req = new UserRequest();
           $req->individual_id = $individual->id;
           $req->details = $request->detail;
           $req->save();
           
           return redirect()->route('index');
        }
        elseif($request->req_type == "institution")
        {
            $institution = new Institution();
            $institution->name = $request->title;
            $institution->institution_type_id = $request->type;
            $institution->contact_person = $request->contact_person;
            $institution->contact_number = $request->contact_number;
            $institution->province_id = $request->province;
            $institution->district_id = $request->district;
            $institution->local_level_id = $request->local_level;
            $institution->coordinates = $request->coordinates;
            $institution->save();
 
            $req = new UserRequest();
            $req->institution_id = $institution->id;
            $req->details = $request->details;
            $req->save();
            
            return redirect()->route('index');
        }

    }

    public function add_response(Request $request)
    {
        return $request;
    }

}
