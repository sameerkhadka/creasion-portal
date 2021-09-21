<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(){
        $items = Faq::orderBy('order')->get();
        return view('admin.faq.index',compact('items'));
    }

    public function save(Request $request){
        try{
            if(count($request->toBeDeleted)>0){
                Faq::destroy($request->toBeDeleted);
            }
            foreach($request->items as $key=>$item){
                if(isset($item['id'])){
                    //update
                    $item['order'] = $key;
                    Faq::find($item['id'])->update($item);
                }
                else{
                    //store
                    $item['order'] = $key;
                    Faq::create($item);
                }
            }
            return response(['faqs'=>Faq::orderBy('order')->get()],200);
        }
        catch(Exception $e){
            return response(['msg'=>$e->getMessage()],$e->getStatusCode());
        }
    }
}
