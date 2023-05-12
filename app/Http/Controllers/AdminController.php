<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\admin;
use App\Models\comments;
use App\Models\recipe;
use App\Models\Role;
use App\Models\User;
use App\Rules\RoleRule;
use App\Services\Admin\AdminService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|View
     */
    public function index(AdminService $admin, LoginAdminRequest $request)
    {
        $credentials = $request->validated();
        try {
            $admin->login($credentials);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
        return redirect()->route('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.login-admin');
        return response('created');
    }

    /**
     * Store a newly created resource in storage.
     *

     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreadminRequest $AdminRequest, adminService $adminService)
    {

        $credentials = $AdminRequest->only('username', 'password', 'email');

        $credentials['avatar'] = $AdminRequest->file('avatar')->store('avatars/admin', 'public');

        try {

            $adminService->CreateUser($credentials);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    public function destroy()
    {
    }

    public function LogOutAdmin(AdminService $adminService, Request $request)
    {
        $adminService->logOut($request);
        if (!request()->ajax()) {
            return redirect()->route('home');
        }
        return response()->json('LogOut');
    }
    public function users()
    {
        $users = collect(User::all())->sortBy('created_at')->values();
        return response()->json(['users' => $users]);
    }
    public function recipes()
    {
        $recipes = collect(recipe::all())->sortBy('created_at')->values();
        return response()->json(['recipes' => $recipes]);
    }
    public function comments()
    {
        $comments = collect(comments::all())->sortBy('created_at')->values();
        return response()->json(['comments' => $comments]);
    }

    public function ChangeRoleUser(AdminService $adminService, Request $request)
    {

        $validate = $request->validate([
            'user_id' => 'required',
            'role' => ['required', 'alpha', new RoleRule],
        ]);

        $adminService->changeRoleUser($request->user_id, $request->role);

        return response()->json([
            'status' => 'updated',
            'message' => 'role Updated',
            'icon' => 'check',
            'style' => 'success'
        ]);
    }
    /**
     * Approve Recipes Users.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function approveRecipes(AdminService $adminService, Request $request, $recipe_id): JsonResponse
    {

        if (!Gate::allow('IsAdmin', 'App\\Models\admin')) {
            throw new Exception("You Dont have Permission to execute this action ", 1);
        }

        $valdiate = $request->validate([
            'recipe_id' => 'required|integer'
        ]);

        $adminService->approveRecipe($request->recipe_id);

        return response()->json([
            'style' => 'success',
            'status' => 'Recipe Approved',
            'icon' => 'check',
        ]);
    }
    public function DenyRecipe(Request $request, AdminService $adminService)
    {

        $this->authorize('IsAdmin', 'App\\Models\admin');

        $valdiate = $request->validate([
            'recipe_id' => 'required|integer'
        ]);

        $adminService->denyRecipe($request->recipe_id);

        return response()->json([
            'style' => 'warning',
            'status' => 'Recipe Deny',
            'icon' => 'warning',
        ]);
    }
    public function deleteRecipe(Request $request, AdminService $adminService)
    {
        if (!Gate::allows('IsAdmin', 'App\\Models\admin')) {
            throw new Exception("You Dont have Permission to execute this action ", 1);
        }
        $valdiate = $request->validate([
            'recipe_id' => 'required|integer'
        ]);

        $adminService->deleteRecipe($request->recipe_id);

        return response()->json([
            'style' => 'warning',
            'status' => 'Recipe Deny',
            'icon' => 'warning',
        ]);
    }

    public function deleteUser(AdminService $adminService, Request $request, $user_id)
    {
        if (!Gate::allows('IsAdmin', 'App\\Models\admin')) {
            throw new Exception("You Dont have Permission to execute this action ", 1);
        }
        $valdiate = $request->validate([
            'user_id' => 'required|integer'
        ]);

        $adminService->deleteUser($request->user_id);

        return response()->json([
            'style' => 'warning',
            'status' => 'User Deleted',
            'icon' => 'warning',
        ]);
    }
    public function AvailableRoles(Role $role)
    {
        return response()->json(['roles' => $role::$roles]);
    }
}
