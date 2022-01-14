<?php

use App\Http\Controllers\LandController;
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

Route::post("create",[LandController::class,"create"]);
Route::get("land",[LandController::class,"allLand"]);
Route::get("land/{id}",[LandController::class,"land"]);
Route::put("modify/{id}",[LandController::class,"modify"]);
Route::post("dimensione",[LandController::class,"dimensione"]);


