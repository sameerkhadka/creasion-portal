<?php

use App\District;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CheckboxController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\MapController;
use App\Province;
use App\Http\Controllers\RequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/pieOld', function () {
    return view('pieOld');
});

// Route::get('importData',function(){
//     $provinces = json_decode(file_get_contents(public_path().'/json/provinces.json'),true)['provinces'];
//     $districts = json_decode(file_get_contents(public_path().'/json/districts.json'),true)['districts'];
//     $municipalities = json_decode(file_get_contents(public_path().'/json/municipalities.json'),true)['municipalities'];
//     foreach($municipalities as $municipality){
//         Municipality::create(
//             [
//                 "title" => $municipality['title'],
//                 "title_en" => $municipality['title_en'],
//                 "title_ne" => $municipality['title_ne'],
//                 "code" => $municipality['code'],
//                 "type" => $municipality['type'],
//                 "order" => $municipality['order'],
//                 "district_id" => $municipality['district'],
//                 "centroid" => json_encode($municipality['centroid']),
//                 "bbox" => json_encode($municipality['bbox']),
//             ]
//         );
//     }
// });
Route::GET('/pie', [ChartController::class,'index']);
Route::POST('/piee', [ChartController::class,'dynamic'])->name('dynamic');

Route::get('/request', [RequestController::class,'index'])->name('getRequest');


Route::post('/filter-response', [FilterController::class,'filterResponse']);

Route::get('/',[MapController::class,'index'])->name('index');

Route::post('/verify-request', [RequestController::class,'verifyRequest'])->name('verify-request');

Route::post('/update-data', [CheckboxController::class,'updateStatus'])->name('update-data');

Route::POST('/request', [RequestController::class,'request'])->name('request');

Route::get('/new-request', [RequestController::class,'new_request'])->name('new_request');

Route::POST('/responses/add', [RequestController::class,'add_response'])->name('add_response');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
