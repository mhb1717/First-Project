<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Basecontroller;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\ResourceController;
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

// Route::get('/task/{name?}', function ($name = null) {
//     $data = compact('task');
//     return view('task')->with($data);
// });
// Route::get('/', function () {
//     return view('home');
// });
Route::get('/about', function () {
    return view('about');
});
Route::get('/home', [Basecontroller::class, 'home']);
Route::get('/about', SingleActionController::class);
Route::resource('/contact', ResourceController::class);
Route::get('/index', function () {
    return view('index');
});
