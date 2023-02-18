<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Resources\RecipeResource;
use App\Models\recipe;
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



Route::get('/test', function () {

   
});
Route::POST('/register/facebook/', [UserController::class, 'RegisterWithFace']);
Route::POST('/login/facebook/', [LoginController::class, 'loginWithMedia']);




Route::resource('profile',ProfileController::class)->parameter('profile','user_id');