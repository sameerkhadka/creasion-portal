<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckboxController extends Controller
{
    public function updateStatus(Request $request){
        $model = '\\App\\Models\\Inventory';
        $user_request = $model::find($request->id);
        $user_request->status = $request->val;
        $user_request->update();
        $msg = $request->val ? 'checked' : 'unchecked';
        return response([
            "msg" => "Successfully {$msg}"
        ],200);
    }
}
