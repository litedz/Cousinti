<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\LoginMediaService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function login(Request $e)

    {
        $credentials  = $e->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $e->email, 'password' => $e->password], false)) {
            $user = User::select('id')->where('email', $e->email)->get();
            Auth::loginUsingId($user);
            return response()->json([
                'status' => 'logged',
                'class' => 'alert-success',
                'message' => ' تم الدخول بنجاح ',
            ]);
        }
        return response()->json([
            'status' => 'failed',
            'class' => 'alert-danger',
            'message' => 'Failed Login the  <strong>' . $e->email . '</strong> or  <strong>Password</strong> is incorrect',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json('logout');
    }

    public function loginWithMedia(Request $request, LoginMediaService $media)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'Id_user_media' => 'required|integer',
        ]);

        try {
            if ($media->attempMedia($request->email, $request->Id_user_media)) {
                return response()->json('Connected');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }



        // $user = User::where('email',$request->email)->first();
        // $userId= Hash::check($request->Id_user_media, $user->Id_user_media);
        // if (Auth::attempt($credentials)) {
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Successful logged',

        //     ]);
        // }
        // else{
        //     throw new Exception("User Not Found", 1);
        // }


        // else{
        //     echo 'failed .. ';
        // }

    }
}




// namespace App\Traits;
// use App\Models\User;
// use Exception;
// use Illuminate\Support\Facades\Hash;

// /**
//  * 
//  */
// trait LoginMedia
// {
//     public static function attempMedia($email,$IdUser)
//     {
//         $user = User::where('email',$email)->first();
//         if (!$user > 1) {
//             throw new Exception("User Not Found", 1);
            
//         }
//         $userId= Hash::check($IdUser, $user->Id_user_media);
//         if (!$userId) {
//             throw new Exception($email .'Or Id is Inccorect', 1);
//         }

//         return true;
        
//     }
// }
