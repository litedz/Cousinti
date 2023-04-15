<?php

namespace App\Services;

use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileServices
{
    public function UpdateProfile(Request $request)
    {
        $update_fields = $request->validate([
            'username' => 'required',
            'avatar' => 'nullable|image',
        ]);
        //  find User
        $user = User::where('id', auth()->user()->id)->firstOrfail();

        if (isset($request->avatar)) {
            //remove old avatar if exist
            $remove_old_avatar = Storage::disk('public')->delete($user->avatar);
            if ($remove_old_avatar) {
                // Store avatar
                $store_avatar = $request->file('avatar')->store('avatars', 'public');
                // update attribute in database
                $update_avatar = $user->update(['avatar' => $store_avatar]);
            }
        }
        // Update username
        $update_user = $user->update([
            'username' => $request->username,
        ]);
        if (!$update_user) {
            throw new Exception('Error Processing Request', 1);
        }
    }

    public function UpdatePermissionService(Request $request)
    {
        $PermValid = $request->validate([
            'show_about_perm' => 'required',
            'show_recipes_perm' => 'required',
        ]);

        // dd($request->all());
        // die();
        $user = User::where('id', auth()->user()->id)->firstOrFail();
        $updatePerm = Profile::where('id', $user->profile_id)
            ->update($PermValid);

        if (!$updatePerm) {
            throw new Exception('خطا في تحديث الصلاحيات', 1);
        }
    }
}
