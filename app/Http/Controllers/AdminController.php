<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\admin;
use App\Models\comments;
use App\Models\recipe;
use App\Models\User;
use App\Rules\RoleRule;
use App\Services\Admin\AdminService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(AdminService $admin, LoginAdminRequest $request)
    {


        $credentials = $request->validated();

        try {
            $admin->login($credentials);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
        return response()->json(['message' => 'success login']);
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

            $adminService->CreateAdmin($credentials);
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

    public function ChangePermUser(AdminService $adminService, Request $request)
    {

        $validate = $request->validate([
            'user_id' => 'required',
            'role' => ['required', 'alpha', new RoleRule],
        ]);


        $adminService->changePermissionUser($request->user_id, $request->role);

        return response()->json([
            'status' => 'updated',
            'icon' => 'check',
        ]);
    }
    /**
     * Approve Recipes Users.
     * 
     * @return void
     */
    public function approveRecipes(AdminService $adminService, Request $request): void
    {

        dd(Gate::allows('viewAny','App\\Models\admin'));
        dd('xx');
        die();
        $adminService->approveRecipe($request->recipe_id);
    }
}
