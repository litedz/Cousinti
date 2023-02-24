<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Services\ProfileServices;
use Exception;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('store method');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user

     */
    public function show(user $user, $user_id, Request $request)
    {

        $editPerm = (Gate::allows('update', $user)) ? true : false;

        $profile_user = collect($user::with(['recipes.images_recipe', 'profile_setting'])
            ->where('id', $user_id)->firstOrFail())
            ->only(['username', 'recipes', 'avatar', 'Id_user_media', 'background', 'profile_setting']);
        return view('user.profile-user', compact('profile_user', 'editPerm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     */
    public function edit(user $user, $user_id)
    {

        $edit_user = $user::find($user_id)->first();
        return response()->json(['info' => collect($edit_user)->only(['username', 'profile_setting'])]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileServices $profileServices)
    {
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
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
