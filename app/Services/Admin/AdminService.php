<?php

namespace App\Services\Admin;

use App\Models\admin;
use App\Models\recipe;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class AdminService extends Authenticatable
{
    public function login(array $data): void
    {
        if (! is_array($data)) {
            throw new Exception('Data Invalid', 1);
        }
        $login = Auth::guard('admin')->attempt($data);

        if (! $login) {
            throw new Exception('password or email incorrect', 1);
        }

        $admin = admin::where('email', $data['email'])->first();

        Auth::loginUsingId($admin->id, true);
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        if (! request()->ajax()) {
            return redirect()->route('home');
        }

        return response()->json('LogOut');
    }

    /**
     * @param  int  $user_id
     */
    public function deleteUser($user_id)
    {
        $user = User::findOrfail($user_id)->delete();
    }

    /**
     * @param  int  $user_id
     * @param  string  $role
     */
    public function changeRoleUser($user_id, $role)
    {

        $role = Role::where('role', '=', $role)->firstOrfail();
        $changePerm = User::findOr($user_id, function () {
            throw new Exception('User Not Found', 1);
        });
        //get Role id
        $changePerm->role_id = $role->id;
        $changePerm->save();
    }

    /**
     * @param  int  $recipe_id
     */
    public function ChangeStatusRecipe($recipe_id, $status)
    {
        $ApproveRecipe = Recipe::findOr($recipe_id, function () {
            throw new Exception('Recipe Not Found', 1);
        });

        $ApproveRecipe->is_approved = $status;
        $ApproveRecipe->save();
    }

    /**
     * @param  int  $recipe_id
     */
    public function deleteRecipe($recipe_id)
    {

        $Recipe = Recipe::findOr($recipe_id, function () {
            throw new Exception('Recipe Not Found', 1);
        });
        $deleteRecipe = recipe::where('id', $recipe_id)->forceDelete();
    }

    /**
     * @param  int  $recipe_id
     */
    public function denyRecipe($recipe_id)
    {
    }

    public function Emailverification()
    {
        // code...
    }
}
