<?php

namespace App\Services\Admin;

use App\Http\Requests\LoginAdminRequest;
use App\Models\admin;
use App\Models\recipe;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class AdminService extends Authenticatable
{


    public function login(array $data): void
    {


        if (!is_array($data)) {
            throw new Exception("Data Invalid", 1);
        }
        $login = Auth::guard('admin')->attempt($data);

        if (!$login) {
            throw new Exception("password or email incorrect", 1);
        }

        $admin = admin::where('email', $data['email'])->first();

        Auth::loginUsingId($admin->id, true);
    }

    public function CreateAdmin(array $admin): void
    {


        $add_Admin = admin::create($admin);
        // if (!$add_Admin) {
        //     throw new Exception("Error Creating admin", 1);
        // }
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        if (!request()->ajax()) {
            return redirect()->route('home');
        }
        return response()->json('LogOut');
    }
    /**
     * 
     * 
     * @param int $user_id
     */
    public function deleteUser($user_id)
    {
    }
    /**
     * 
     * 
     * @param int $recipe_id
     */
    public function approveRecipe($recipe_id)
    {
        dd('approved');
    }
    public function deleteRecipe($recipe_id)
    {

        dd('deleted');
        $deleteRecipe = recipe::where('id', $recipe_id)->delete();
        
    }

    /**
     * 
     * 
     * @param int $user_id
     * @param string $role
     */
    public function changePermissionUser($user_id, $role)
    {

        $role = Role::where('role', '=', $role)->firstOrfail();
        $changePerm = admin::findOr($user_id, function () {
            throw new Exception("User Not Found", 1);
        });
        //get Role id
        $changePerm->role_id = $role->id;
        $changePerm->save();

        return true;
    }
}
