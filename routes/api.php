<?php

use App\Http\Controllers\GuestRecipeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Resources\RecipeResource;
use App\Models\comments;
use App\Models\Profile;
use App\Models\recipe;
use App\Models\User;
use Carbon\Carbon;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




// Route::POST('/register/facebook/', [UserController::class, 'RegisterWithFace']);
// Route::POST('/login/facebook/', [LoginController::class, 'loginWithMedia']);




// Route::resource('profile', ProfileController::class)->parameter('profile', 'user_id');


// route::get('/test/test', function () {
//     $profile_user = collect(User::with(['recipes.images_recipe', 'profile_setting'])->where('id', 7)->firstOrFail())->only(['username', 'recipes', 'avatar', 'Id_user_media', 'background', 'profile_setting']);
//     return $profile_user;
// });


// Route::get('profile/{user_id}/edit/permission', [ProfileController::class, 'updatePerm'])->name('profile.edit.perm')->middleware(['auth', 'check.facebookUser']);




// Route::prefix('guest')->group(function () {
//     Route::resource('recipe', GuestRecipeController::class)->names('guest.recipe');
//     route::post('filter/{filter_key}', [GuestRecipeController::class, 'filter'])->name('guest.recipe.filter');
//     route::post('search/{search_key}', [GuestRecipeController::class, 'search'])->name('guest.recipe.search');
// });


// Route::get('test', function () {
//     $s = recipe::whereMonth('created_at', Carbon::now()->format('m'))->limit(6)->get();
//     // $a=Carbon::create('2000-01-01');
//     // $c=$a->diff(Carbon::now());

//     dd($s);
//     //    return response()->json($s);
// });

// Route::post('/recipes/BestOf', [RecipeController::class, 'BestRecipe'])->name('recipe.BestOf');
Route::resource('recipe', RecipeController::class);