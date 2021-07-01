<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

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

Route::get('/', [ChartController::class,'index'])->name('index');

Route::POST('/pie', [ChartController::class,'dynamic'])->name('dynamic');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
