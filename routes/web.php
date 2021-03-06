<?php

use App\Http\Controllers\AddMemberController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use App\Http\Controllers\MemberController;

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
$data = "hi, let's learn laravel!";
//$data = Str::ucfirst($data);
//$data = Str::replaceFirst('Hi', 'Hello', $data);
//This is time consuming so we can use fluent strings in order to chain the string methods
$data = Str::of($data)
    ->ucfirst($data)
    ->replaceFirst('Hi', 'Hello', $data)
    ->camel($data);
//echo $data;
Route::get('/', function () {
    // return view('welcome');
    return redirect('about');
});
Route::get('/about', function () {
    return view('about');
});
// Route::view('about', 'about'); //Short hand for creating a route (1st parameter is route and second is blade file)
//Route::view('contact', 'contact');
//Route::get('users', [UsersController::class, 'loadView']);
//Route::view('login', 'login')->middleware(['protectedPage']);
Route::post('users', [UsersController::class, 'signIn']);
Route::view('profile', 'users');
Route::view('noaccess', 'noaccess');
Route::group(['middleware' => ['protectPage']], function (){
    Route::view('contact', 'contact');
});
Route::get('all-users', [UsersController::class, 'getUsers']);
Route::get('user-profiles', [UsersController::class, 'index']);
Route::get('login', function (){
    if(session()->has('user'))
    {
        return redirect('profile');
    }
    return view('login');
})->middleware(['protectedPage']);
Route::get('logout', function (){
   if(session()->has('user'))
   {
       session()->pull('user');
   }
   return redirect('login');
});
Route::view('add', 'add');
Route::post("add-member", [AddMemberController::class, 'addMember']);
Route::view('upload', 'upload');
Route::post('upload', [UploadController::class, 'index']);
Route::get('locale/{lang}', function ($lang){
    App::setLocale($lang);
    return view('locale');
});
Route::get('list', [MemberController::class, 'show']);
Route::view('add-user', 'add-user');
Route::post('add', [MemberController::class, 'addData']);
Route::get('delete/{id}', [MemberController::class, 'delete']);
Route::get('edit/{id}', [MemberController::class, 'showData']);
Route::post('edit', [MemberController::class, 'update']);
Route::get('test-query', [MemberController::class, 'dbOperations']);
Route::get('aggregate', [MemberController::class, 'operations']);
Route::get('show', [MemberController::class, 'showJoin']);
//Route::get("devices/{key}", [\App\Http\Controllers\DeviceController::class, 'index']);
Route::get("devices/{key:name}", [\App\Http\Controllers\DeviceController::class, 'index']);
//Route::view('users', 'users');
// Route::view('users', 'Users@index'); //Deprecated way of registring controller
