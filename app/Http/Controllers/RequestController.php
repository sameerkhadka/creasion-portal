<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Individual;

use App\Models\Institution;

use App\Models\Province;

use App\Models\District;

use App\Models\LocalLevel;

use App\Models\UserRequest;

use App\Models\Project;

use App\Models\Response;

use App\Models\InventoryResponse;

use App\Models\User;

use App\Models\ProjectUserRequest;

use App\Models\InventoryUserRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class RequestController extends Controller
{
    public function index()
    {
        // $types = InstitutionType::all();
        $projects = Project::with('inventories')->get();
        $provinces = Province::with('districts')->get();

        return view('request', compact('projects','provinces'));
    }

    public function new_request(Request $request){
        // 11
        $settingTotalRequests = Setting::where('key','admin.total_requests')->first();
        // 13
        $totalRequestsCount = UserRequest::all()->count();

        // 2 request new
        $totalNewRequestsCount = $totalRequestsCount - $settingTotalRequests->value;

        if($totalNewRequestsCount<0){  $settingTotalRequests->value = $totalRequestsCount; $settingTotalRequests->update();  $totalNewRequestsCount=0; }


        if($totalNewRequestsCount==0) return response(['msg'=>'No New Request','totalNewRequestsCount'=>0],200);
        $newRequests = UserRequest::with(['individual','institution','projects'])->where('seen',null)->orderBy('id','desc')->take(10)->get();

        $settingTotalRequests->value = $totalRequestsCount;
        $settingTotalRequests->update();

        return response([
            'msg'=>$totalNewRequestsCount.' New Requests',
            'totalNewRequestsCount'=>$totalNewRequestsCount,
            'newRequests'=>$newRequests
        ],200);
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
        $modelData = json_decode($request->modelData, true);
        if($modelData["userType"] == "individual")
        {
            Validator::make($modelData, [
                'individual.fullName' => 'required',
                'individual.gender' => 'required',
                'individual.age' => 'required',
                'province' => 'required',
                'district' => 'required',
                'localAddress' => 'required',
                'coordinate' => 'required',
            ],[],[
            'individual.fullName' => 'Full Name',
            'individual.gender' => 'Gender',
            'individual.age' => 'Age',
            'coordinate' => 'Co-ordinate',
            ])->validate();
           $individual = new Individual();
           $individual->name = $modelData["individual"]["fullName"];
           $individual->gender = $modelData["individual"]["gender"];
           $individual->age = $modelData["individual"]["age"];
           $individual->contact_number = $modelData["individual"]["contactNumber"];
           $individual->province_id = $modelData["province"];
           $individual->district_id = $modelData["district"];
           $individual->localAddress = $modelData["localAddress"];
           $individual->coordinates = json_encode($modelData["coordinate"]);
           $individual->save();

           $req = new UserRequest();
           $req->individual_id = $individual->id;
        //    $req->details = $request->detail;
        //    $req->project_id = $request->project;
           $req->save();

           foreach(json_decode($request->projectWithInventories, true) as $item)
            {
                    $project = new ProjectUserRequest();
                    $project->project_id = $item["id"];
                    $project->user_request_id = $req->id;
                    $project->save();

                foreach($item["inventories"] as $inventory)
                {
                    if(isset($inventory["checked"]))
                    {
                        if($inventory["checked"])
                        {
                            $invent = new InventoryUserRequest();
                            $invent->inventory_id = $inventory["id"];
                            $invent->quantity = $inventory["requestQuantity"];
                            $invent->unit = $inventory["units"];
                            $invent->user_request_id = $req->id;
                            $invent->save();
                            // return $inventory["title"];
                        }
                    }
                }
            }
        }
        elseif($modelData["userType"] == "institution")
        {
            Validator::make($modelData, [
                'institution.organizationName' => 'required',
                'institution.organizationType' => 'required',
                'institution.organizationAddress' => 'required',
                'institution.contactPerson' => 'required',
                'province' => 'required',
                'district' => 'required',
                'localAddress' => 'required',
                'coordinate' => 'required',

            ],[],[
            'institution.organizationName' => 'Organization Name',
            'institution.organizationType' => 'Organization Type',
            'institution.organizationAddress' => 'Organization Address',
            'institution.contactPerson' => 'Contact Person',
            'coordinate' => 'Co-ordinate',
            ])->validate();
            $institution = new Institution();
            $institution->name = $modelData["institution"]["organizationName"];
            $institution->organizationType = $modelData["institution"]["organizationType"];
            $institution->address = $modelData["institution"]["organizationAddress"];
            $institution->contact_person = $modelData["institution"]["contactPerson"];
            $institution->contact_number = $modelData["institution"]["contactNumber"];
            $institution->province_id = $modelData["province"];
            $institution->district_id = $modelData["district"];
            $institution->localAddress = $modelData["localAddress"];
            $institution->coordinates = json_encode($modelData["coordinate"]);

            $institution->save();

            $req = new UserRequest();
            $req->institution_id = $institution->id;
            // $req->details = $request->detail;
            // $req->project_id = $request->project;
            $req->save();

            foreach(json_decode($request->projectWithInventories, true) as $item)
            {
                    $project = new ProjectUserRequest();
                    $project->project_id = $item["id"];
                    $project->user_request_id = $req->id;
                    $project->save();

                foreach($item["inventories"] as $inventory)
                {
                    if(isset($inventory["checked"]))
                        {
                        if($inventory["checked"]){
                            $invent = new InventoryUserRequest();
                            $invent->inventory_id = $inventory["id"];
                            $invent->quantity = $inventory["requestQuantity"];
                            $invent->unit = $inventory["units"];
                            $invent->user_request_id = $req->id;
                            $invent->save();
                            // return $inventory["title"];
                        }
                    }
                }
            }
        }
        $fileArr = [];
        if(isset($request->myFiles)){
            if($files=$request->file('myFiles')){
                foreach($files as $file){
                    $storedFileName = Str::random(20).'.'.$file->getClientOriginalExtension();
                    $originalFileName = $file->getClientOriginalName();
                    $fileArr[] = [
                        'download_link' => 'user-requests/'.$storedFileName,
                        'original_name' => $originalFileName
                    ];
                    $file->move('storage/user-requests'.'/',$storedFileName);
                }
            }
        }
        $req->files = json_encode($fileArr);
        if($modelData["requestDate"]){
            $req->created_at = $modelData["requestDate"];
        }
        $req->update();
        Session::flash('success','Successfully Saved');
        return response(['msg'=>'succeed'],200);
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
                if(isset($request->responses['created_at'])){
                    $response->created_at = $request->responses['created_at'];
                }
                $response->user_request_id = $request->user_request_id;
                $response->save();
        }
         //update
         else{
             $response = Response::find($request->response_id);
             if(isset($request->responses['created_at'])){
                $response->created_at = $request->responses['created_at'];
                }
             $response->update();
             $type = 'updated';
         }

        //  dd($response);

        // what is user_request id?
         $user_request_id = $response->user_request_id;
         $user_request = UserRequest::find($user_request_id);
         $user_request->verified = 1;
         $user_request->update();

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
