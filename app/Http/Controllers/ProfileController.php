<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Services\ProfileServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\ResponseJson
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('store method');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user, $user_id, Request $request)
    {

        $editPerm = Gate::inspect('edit', 'App\\Models\User')->allowed() ? true : false;

        $profile_user = collect($user::with(['recipes.images_recipe', 'profile_setting', 'comments'])->where('id', $user_id)->firstOrFail())
            ->only(['username', 'recipes', 'avatar', 'Id_user_media', 'background', 'profile_setting', 'comments']);

        return view('user.profile-user', compact('profile_user', 'editPerm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user, $user_id)
    {

        Gate::authorize('edit', User::class);
        $editPerm = true;
        $edit_user = $user::find($user_id)->first();

        return response()->json(['info' => collect($edit_user)->only(['username', 'profile_setting'])]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileServices $profileServices)
    {
        Gate::authorize('update', User::class);
        try {
            $profileServices->UpdateProfile($request);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }

        return response()->json(['status' => 'updated', 'message' => 'تم تحديث البروفايل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }

    public function updatePerm(request $request, ProfileServices $profileServices)
    {
        Gate::authorize('update', 'App\\Models\User');
        try {
            $profileServices->UpdatePermissionService($request);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }

        return response()->json([
            'status' => 'updated',
            'message' => 'لقد تم تحديث الصلاحيات بنجاح',
            'class' => 'success',
        ]);
    }
}
