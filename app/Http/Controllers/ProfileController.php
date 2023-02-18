<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user

     */
    public function show(user $user, $user_id, Request $request)
    {
        if (Gate::allows('view', $user)) {
            $editPerm = true;
        }

        $editPerm = (Gate::allows('view', $user)) ? true : false;

        $profile_user = collect($user::with('recipes.images_recipe')->where('id', $user_id)->first())->only(['username', 'recipes', 'avatar', 'Id_user_media']);
        // return response()->json($profile_user);
        return view('user.profile-user', compact('profile_user','editPerm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     */
    public function edit(user $user)
    {

        dd('xxx');
        return view('user.profile-user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
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
