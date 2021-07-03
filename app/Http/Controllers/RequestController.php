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

use App\Models\Project;

use App\Models\Response;

use App\Models\InventoryResponse;

class RequestController extends Controller
{
    public function index()
    {
        $province = Province::all();
        $district = District::all();
        $local = LocalLevel::all();
        $types = InstitutionType::all();
        $project = Project::all();
        return view('request', compact('types','province','district','local','project'));
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
           $individual->contact_number = $request->phone;
           $individual->save();

           $req = new UserRequest();
           $req->individual_id = $individual->id;
           $req->details = $request->detail;
           $req->project_id = $request->project;
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
            $req->project_id = $request->projects;
            $req->save();

            return redirect()->route('index');
        }

    }

    public function add_response(Request $request)
    {   
        $response = new Response();
        if($request->individual_id)
        {
            $response->individual_id = $request->individual_id;
        }
        else
        {
            $response->institution_id = $request->institution_id;
        }
        $response->save();       

        foreach($request->responded_items as $item)
        {
            $responded_item = new InventoryResponse();
            $responded_item->response_id = $response->id;
            $responded_item->inventory_id = $item['inventory_id'];
            $responded_item->quantity = $item['quantity'];
            $responded_item->save();
        }       
       
            
    }

}
