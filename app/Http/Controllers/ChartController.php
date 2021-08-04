<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Particular;

use App\Models\Project;
use App\Models\Response;
use App\Models\ChartData;

class ChartController extends Controller
{
    public function index()
    {

        return $mydata = [
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
        $response = Response::where('individual_id','!=',null)->with(['individual','userRequest'])->get();
        return $response;
    }

    public function dynamic(Request $request)
    {
        $get = $request->value;
        $result = Particular::select('*')
        ->where('project_id', '=', $get)
        ->get();
        $data = [];
        $quan = [];
        $colour = [];
        $sum = 0;
        foreach($result as $val){
             array_push($data,$val->name);
             array_push($quan,$val->Quantity);
             array_push($colour,$val->color);
            $sum = $sum + $val->Quantity;
        }
        $chartData = $data;
        $quantity = $quan;
        $color = $colour;
        $projects = Project::all();
        $id = $get;
        return response(compact('id','sum','chartData','quantity','color','projects'));
    }

    public function chartData(Request $request, $id)
    {
        $item = ChartData::find($id);
        $item->description = $request->description;
        $item->save();
        return redirect()->back();
    }

    public function gender_charts()
    {
        return view('gender_charts');
    }
}
