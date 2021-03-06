<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::apiResource("test", \App\Http\Controllers\TestResource::class);
});
Route::get("data", [\App\Http\Controllers\dummyAPI::class, 'getData']);
Route::get("list", [\App\Http\Controllers\DeviceController::class, 'list']);
Route::post("add", [\App\Http\Controllers\DeviceController::class, 'add']);
Route::get("search/{name}", [\App\Http\Controllers\DeviceController::class, 'search']);
Route::post("save", [\App\Http\Controllers\DeviceController::class, 'testData']);
Route::post("login",[UserController::class,'index']);
Route::post("upload", [FileController::class, 'upload']);
