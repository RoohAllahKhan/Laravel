<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
//Route::view('contact', 'contact');
Route::get('users', [UsersController::class, 'loadView']);
Route::post('users', [UsersController::class, 'signIn']);
Route::view('login', 'login');
Route::view('noaccess', 'noaccess');
Route::group(['middleware' => ['protectPage']], function (){
    Route::view('contact', 'contact');
});
//Route::view('users', 'users');
// Route::view('users', 'Users@index'); //Deprecated way of registring controller
