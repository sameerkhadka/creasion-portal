<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Particular;

use App\Models\Project;

class ChartController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('pie', compact('projects'));
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
}
