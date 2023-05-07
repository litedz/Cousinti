<?php

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

use App\Http\Controllers\AdminController;
use App\Models\Role;
use App\Rules\InData;
use App\Rules\InDataRule;
use App\Rules\RoleRule;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return view('test');
});


// route::prefix('panel')->group(function () {

//     route::resource('admin', AdminController::class);
//     route::post('/admin', [AdminController::class, 'index'])->name('admin.index');
//     route::get('dashboard', function () {
//         return view('admin.login-admin');
//     })->name('admin.dashboard');
// });

route::resource('admin', AdminController::class)->except('index');
route::post('/admin/login', [AdminController::class, 'index'])->name('admin.index');
route::get('logout', [AdminController::class, 'LogOutAdmin'])->name('admin.logout');
route::get('users', [AdminController::class, 'users'])->name('admin.actions.users');
route::get('recipes', [AdminController::class, 'recipes'])->name('admin.actions.recipes');
route::get('comments', [AdminController::class, 'comments'])->name('admin.actions.comments');
route::post('permissionUser', [AdminController::class, 'ChangePermUser'])->name('admin.actions.change.permission');
route::post('recipes/approved', [AdminController::class, 'approveRecipes'])->name('admin.recipes.actions.approved');
route::delete('recipes/delete', [AdminController::class, 'deleteRecipe'])->name('admin.recipes.actions.delete');


// Route::get('test', function (Request $request) {

//     $t = new AdminService();
//     $t->changePermissionUser($request->user_id, $request->role);
// });
