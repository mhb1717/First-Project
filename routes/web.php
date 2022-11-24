<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Basecontroller;
use App\Http\Controllers\Careercontroller;
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
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
// Route::get('/register', [Basecontroller::class, 'home']);
// Route::get('/about', SingleActionController::class);
// Route::resource('/contact', ResourceController::class);
// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/services', function () {
//     return view('services');
// });
Route::get('/new', function () {
    return view('newpage');
});
// Route::get('/registor', function () {
//     return view('registor');
// });
Route::get('/registor', [Basecontroller::class, 'registor_page']);
Route::post('/registor', [Basecontroller::class, 'registor']);
Route::get('/home', [Basecontroller::class, 'home']);
Route::get('/index', [Basecontroller::class, 'index']);
Route::get('/login', [Basecontroller::class, 'login_page']);
Route::post('/login', [Basecontroller::class, 'login']);
Route::get('/signout', [Basecontroller::class, 'signOut']);
Route::get('/career', [Careercontroller::class, 'career_page']);
Route::post('/career', [Careercontroller::class, 'career']);
