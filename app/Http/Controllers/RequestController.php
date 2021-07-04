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
use Illuminate\Support\Facades\Session;

class RequestController extends Controller
{
    public function index()
    {
        $features = Response::with('userRequest','institution','individual','inventories')->get();
        $response['type'] = 'FeatureCollection';
        $i = 0;
        foreach($features as $item){
            $response['features'][$i]['type']='Feature';
            $response['features'][$i]['properties']=$item;
            $response['features'][$i]['geometry']['type']="Point";
            $response['features'][$i]['geometry']['coordinates']=$item->institution_id ? $item->institution->coordinates : $item->individual->coordinates;
            $i++;
        }
        return $response;

        $types = InstitutionType::all();
        $project = Project::all();
        return view('request', compact('types','project'));
    }

    public function verifyRequest(Request $request){
        $user_request = UserRequest::find($request->id);
        $user_request->verified = $request->val;
        $user_request->update();
        $msg = $request->val ? 'verified' : 'unverified';
        return response([
            "msg" => "Successfully {$msg}"
        ],200);
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
            $institution->province_id = $request->province_id;
            $institution->district_id = $request->district_id;
            $institution->local_level_id = $request->local_level_id;
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
        $type = 'created';
        // creation
        if(!$request->response_id){
            $response = new Response();
            if($request->individual_id)
            {
                $response->individual_id = $request->individual_id;
            }
            else
            {
                $response->institution_id = $request->institution_id;
            }
            $response->user_request_id = $request->user_request_id;
            $response->save();
         }
         //update
         else{
             $response = Response::find($request->response_id);
             $type = 'updated';
         }
        //  dd($response);

        //removing all inventory with -1
        $respondedItems = collect($request->responded_items)->filter(function($item){
            return $item['inventory_id']!=-1;
        });

        //saving in inventory_response table
        $response->inventories()->detach();
        $response->inventories()->attach($respondedItems);
        Session::flash('success',"Response {$type} successfully" );

    }

}
