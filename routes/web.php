<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect('about');
});
Route::get('/about', function () {
    return view('about');
});
// Route::view('about', 'about'); //Short hand for creating a route (1st parameter is route and second is blade file)
Route::view('contact', 'contact');
Route::get('users/{user}', [Users::class, 'index']);
