<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Resources\RecipeResource;
use App\Models\recipe;
use App\Models\User;
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




Route::resource('profile', ProfileController::class)->parameter('profile', 'user_id');


route::get('/test/test', function () {
    $profile_user = collect(User::with(['recipes.images_recipe', 'profile_setting'])->where('id', 7)->firstOrFail())->only(['username', 'recipes', 'avatar', 'Id_user_media', 'background', 'profile_setting']);
    return $profile_user;
});


Route::get('profile/{user_id}/edit/permission', [ProfileController::class, 'updatePerm'])->name('profile.edit.perm')->middleware(['auth', 'check.facebookUser']);
