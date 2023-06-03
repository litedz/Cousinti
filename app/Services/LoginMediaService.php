<?php

namespace App\Services;

use App\Exceptions\IncorrecEmailOrPasswordException;
use App\Exceptions\UserNoRegistedException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginMediaService
{
    public function attempMedia($email, $IdUser)
    {
        $user_check = User::where('email', $email)->first();

        if (!isset($user_check) || is_null($user_check)) {
            throw new UserNoRegistedException('لا يوجد حساب بهذا الفيس بوك الرجاء التسجيل عبر الرابط ادناه', 1);
        }

        $userId = Hash::check($IdUser, $user_check->Id_user_media);
        
        if (!$userId) {
            throw new IncorrecEmailOrPasswordException($email . ' Or Id is Inccorect');
        }
        Auth::loginUsingId($user_check->id);
    }
}
