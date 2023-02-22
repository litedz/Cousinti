<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileServices
{
    public function UpdateProfile(Request $request)
    {


        $update_fields = $request->validate([
            'name' => 'required',
            'avatar' => 'required|image',
            'background' => 'required',
        ]);

        //  find User 
        $user = User::where('id', auth()->user()->id)->firstOrfail();
        // Store avatar 
        $store_avatar = $request->file('avatar')->store('avatars', 'public');
        // store info 
        $update = User::where('id', auth()->user()->id)->update([
            'username' => $request->name,
            'background' => $request->background,
            'avatar' => $store_avatar,
        ]);

        if ($update && $store_avatar) {
            $remove_old_avatar = Storage::disk('public')->delete($user->avatar);
        } else {
            throw new Exception("Error Processing Request", 1);
        }
    }
}
