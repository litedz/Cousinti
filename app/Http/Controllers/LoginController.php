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

    }
}

