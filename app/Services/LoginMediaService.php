<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginMediaService {
    public function attempMedia($email, $IdUser)
    {

        
        $user_check = User::where('email', $email)->first();
        if (!$user_check > 0) {
            throw new Exception("لا يوجد عندنا حساب بهذا الفيس بوك الرجاء التسجيل عبر الرابط ادناه");
        }
        $userId = Hash::check($IdUser, $user_check->Id_user_media);
        if (!$userId) {
            throw new Exception($email . ' Or Id is Inccorect');
        }
        Auth::loginUsingId($user_check->id);

        return true;
    }
}
