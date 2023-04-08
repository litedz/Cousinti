<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\GuestRecipeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Jobs\Subscribe;
use App\Models\recipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|azea
*/

// *****************************  User Views    ***********************************************

Route::get('/home', function () {
    return view('index');
})->name('home');
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::put('profile/{user_id}/edit/permission', [ProfileController::class, 'updatePerm'])->name('profile.edit.perm')->middleware(['auth', 'check.facebookUser']);
Route::resource('profile', ProfileController::class)->parameter('profile', 'user_id')->middleware(['auth', 'check.facebookUser']);

// -------------------------> User actions

// ***********************************************************************************************

// *****************************  recipe views    ***********************************************

Route::get('/recipes', function () {
    return view('recipes.recipes');
});

Route::get('types_recipe', [RecipeController::class, 'types_recipe'])->name('recipe.types');

Route::get('/recipes/{recipe_id}', function ($recipe_id) {
    $recipe_exist = recipe::findOrFail($recipe_id);

    return view('recipes.single-recipe', compact(['recipe_id' => 'recipe_id']));
})->name('single.recipe');

Route::get('/similar/{type}', function () {
    return view('recipes.same_type_recipe');
})->name('recipe.same_type');

Route::middleware(['auth'])->group(function () {

    Route::get('/recipe/{recipe_id}', [RecipeController::class, 'show']);
    Route::get('/user/recipes', [RecipeController::class, 'recipe_user'])->name('user.recipes');

    // --------------------------> recipe actions

    Route::resource('recipe', RecipeController::class);
    Route::post('recipe/{recipe_id}', [RecipeController::class, 'update']);
    Route::post('/recipes/search/{key}', [RecipeController::class, 'search_recipe'])->name('recipe.search');
    Route::get('/recipes/filter/{by}', [RecipeController::class, 'filter_recipes'])->name('recipe.filter');
    Route::post('recipe/like/{recipe_id}', [RecipeController::class, 'like_recipe']);
    Route::delete('recipe/image/{image_id}', [RecipeController::class, 'RemovePrevImage'])->name('recipe.image.remove');

    // ***********************************************************************************************

});

// *****************************  Auth reg/log    ***********************************************

// Guest Routes
Route::prefix('guest')->group(function () {
    Route::resource('recipe', GuestRecipeController::class)->names('guest.recipe');
    route::get('filter/{type}', [GuestRecipeController::class, 'filter'])->name('guest.recipe.filter');
    route::post('search/{search_key}', [GuestRecipeController::class, 'search'])->name('guest.recipe.search');
    route::get('subscribe', [GuestRecipeController::class, 'Subscribe'])->name('guest.recipe.subscribe');
    route::get('recipes/latest', [GuestRecipeController::class, 'LatestRecipes'])->name('guest.recipe.latest');
    Route::post('recipes/random', [GuestRecipeController::class, 'randomRecipe'])->name('recipe.random');
});

//Subscribe route
Route::post('/subscribe', [UserController::class, 'Subscribe']);

Route::middleware(['auth'])->group(function () {
    //User Routes
    Route::resource('user', UserController::class)->except(['store']);
    Route::prefix('user')->group(
        function () {
            Route::POST('avatar', [UserController::class, 'updateAvatar']);
            Route::POST('password', [UserController::class, 'changePassword']);
            Route::get('{recipe_id}/liked', [UserController::class, 'RecipeUserLiked'])->name('recipe.liked');
        }
    );
});

Route::resource('comments', CommentsController::class);

//Authantication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('check.login');
Route::post('/login', [LoginController::class, 'login'])->name('login.user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', function () {
    return view('user.register');
})->name('user.register')->middleware('check.login');
Route::POST('/register', [UserController::class, 'store']);
Route::POST('/register/facebook/', [UserController::class, 'RegisterWithFace']);
// ***********************************************************************************************

//Api Facebook
Route::post('/facebook/login', [LoginController::class, 'loginWithMedia']);

Route::get('test', function () {

    Subscribe::dispatch('maamarjoe@gmail.com');
});
