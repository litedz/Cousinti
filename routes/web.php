<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMessagesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\GuestRecipeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TypesRecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishRecipeController;
use App\Jobs\Subscribe;
use App\Models\rank;
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
})->middleware('is.approved')->name('single.recipe');

Route::get('/similar/{type}', function () {
    return view('recipes.same_type_recipe');
})->name('recipe.same_type');

//Recipes Routes For Auth User
Route::middleware(['auth'])->group(function () {
    Route::get('/recipe/{recipe_id}', [RecipeController::class, 'show']);
    Route::get('/user/recipes', [RecipeController::class, 'recipes_user'])->name('user.recipes');
    // --------------------------> recipe actions
    Route::resource('recipe', RecipeController::class);
    Route::post('recipe/{recipe_id}', [RecipeController::class, 'update']);
    Route::post('/recipes/search/{key}', [RecipeController::class, 'search_recipe'])->name('recipe.search');
    Route::get('/recipes/filter/{by}', [RecipeController::class, 'filter_recipes'])->name('recipe.filter');

    Route::delete('recipe/image/{image_id}', [RecipeController::class, 'RemovePrevImage'])->name('recipe.image.remove');
}); // ***********************************************************************************************

Route::post('recipe/like/{recipe_id}', [RecipeController::class, 'AddOrRemoveLike'])->name('recipe.like')->middleware('is.registed');
Route::get('recipe/{recipe_id}/liked', [RecipeController::class, 'IsLiked'])->name('recipe.isLiked');
Route::get('recipe/{recipe_id}/likes', [RecipeController::class, 'CountLikes'])->name('recipe.likes');

//wish list resource for user
Route::resource('wishlist', WishRecipeController::class)->middleware(['is.registed', 'auth']);

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
//User Routes
Route::prefix('user')->group(function () {
    Route::middleware(['auth'])->group(
        function () {
            Route::resource('user', UserController::class)->except(['store']);
            Route::POST('avatar', [UserController::class, 'updateAvatar']);
            Route::POST('password', [UserController::class, 'changePassword']);
            Route::get('lastActivity', [UserController::class, 'LastActivity'])->name('last.activity');
            //Notification
            route::resource('/notifi', notificationController::class);
            //statistic

            Route::get('statistic/{user_id}',[UserController::class,'staticUser']);
            
        }
    );

    Route::get('{recipe_id}/liked', [UserController::class, 'RecipeUserLiked'])->name('recipe.liked');
});

// Comments Routes
Route::resource('comments', CommentsController::class)->middleware('is.registed');

// Message or chat routes

Route::resource('messages', MessageController::class)->middleware('auth');

//Authantication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('check.login');
Route::post('/login', [LoginController::class, 'login'])->name('login.user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('register','user.register')->name('user.register')->middleware('check.login');
Route::POST('/register', [UserController::class, 'store']);
Route::POST('/register/facebook/', [UserController::class, 'RegisterWithFace']);
// ***********************************************************************************************

//Api Facebook
Route::post('/facebook/login', [LoginController::class, 'loginWithMedia']);

// Admin Resources

route::prefix('panel')->group(function () {
    route::middleware('auth:admin')->group(function () {
        Route::view('/dashboard', 'admin.dashboard-admin')->name('admin.dashboard');
        route::get('logout', [AdminController::class, 'LogOutAdmin'])->name('admin.logout');
        route::get('users', [AdminController::class, 'users'])->name('admin.actions.users');
        route::get('recipes', [AdminController::class, 'recipes'])->name('admin.actions.recipes');
        route::get('comments', [AdminController::class, 'comments'])->name('admin.actions.comments');

        route::post('recipes/{recipe_id}/status', [AdminController::class, 'ChangeStatusRecipe'])->name('admin.recipes.actions.status');
        // route::post('recipes/{recipe_id}/deny', [AdminController::class, 'denyRecipe'])->name('admin.recipes.actions.approved');
        route::delete('recipes/delete', [AdminController::class, 'deleteRecipe'])->name('admin.recipes.actions.delete');
        route::delete('users/{user_id}', [AdminController::class, 'deleteUser'])->name('admin.users.actions.delete');

        route::post('role/change', [AdminController::class, 'ChangeRoleUser'])->name('admin.roles.change');
        route::get('roles', [AdminController::class, 'AvailableRoles'])->name('admin.roles.actions.get');

        Route::resource('admin_messages', AdminMessagesController::class);
        Route::post('admin_message/message/sending', [AdminMessagesController::class, 'MessageUser']);

        Route::post('messages/Reply', [AdminMessagesController::class, 'ReplyMessage']);

        //statistic Website for admin (chart js) routes 
        Route::get('static/users', [AdminController::class, 'statisticUsers']);
        Route::get('static/recipes', [AdminController::class, 'statisticRecipes']);
        //Types recipe
        Route::resource('types', TypesRecipeController::class);
        // Social media
        Route::resource('media', SocialMediaController::class);
    });
    route::resource('admin', AdminController::class)->middleware('auth')->except('index');
    route::post('admin/login', [AdminController::class, 'index'])->name('admin.index');
    // login form
    route::view('login', 'admin.login-admin')->middleware('is.admin');
});

Route::resource('messages', MessageController::class);
Route::post('contact-support', [MessageController::class, 'ContactSuport']);

// testing

Route::get('test', function () {

    return rank::$ranks['chef'];
});
