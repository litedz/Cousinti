<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return request()->user_id == auth()->user()->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * 
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {


        return $user->id == auth()->user()->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * 
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, user $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * 
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, user $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * 
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, user $model)
    {
        //
    }
    public function edit()
    {

        return request()->user_id == auth()->user()->id;
    }

 
}
