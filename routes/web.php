<?php

use App\District;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
<<<<<<< HEAD
use App\Municipality;
use App\Province;
=======
use App\Http\Controllers\RequestController;
>>>>>>> 3bc8068b88c0ef5a63c96d92274ad35f6ed1507a

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

// Route::get('/p', function () {
//     return view('p');
// });

<<<<<<< HEAD
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

Route::get('/', [ChartController::class,'index'])->name('index');
=======
Route::get('/pie', [ChartController::class,'index'])->name('index');
>>>>>>> 3bc8068b88c0ef5a63c96d92274ad35f6ed1507a

Route::POST('/pie', [ChartController::class,'dynamic'])->name('dynamic');

Route::get('/', [RequestController::class,'index'])->name('index');

Route::POST('/request', [RequestController::class,'request'])->name('request');

Route::POST('/responses/add', [RequestController::class,'add_response'])->name('add_response');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
