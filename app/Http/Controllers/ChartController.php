<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Particular;

use App\Models\Category;

class ChartController extends Controller
{
    public function PieChart()
    {
        $result = Particular::select('*')
        ->where('category_id', '=', '1')
        ->get();
        $data = "";
        $quan = "";
        $colour = "";
        foreach($result as $val){
             $data.="'$val->name',";
             $quan.="$val->Quantity,";
             $colour.="'$val->color',";
        }
        $chartData = $data;
        $quantity = $quan;
        $color = $colour;
        return view('pie', compact('chartData','quantity','color'))->with('categories', Category::all());
    }

    public function dynamic(Request $request)
    {
        $get = $request->value;
        $result = Particular::select('*')
        ->where('category_id', '=', $get)
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
        $categories = Category::all();
        $id = $get;
        return response(compact('id','sum','chartData','quantity','color','categories'));
    }
}
