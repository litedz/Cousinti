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

        $credentials = $e->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $e->email, 'password' => $e->password], $e->remember_me)) {

            $e->session()->regenerate();
            $user = User::where('email', $e->email)->firstOrfail();
            Auth::loginUsingId($user->id, $e->remember_me);

            return response()->json([
                'status' => 'logged',
                'class' => 'alert-success',
                'message' => ' تم الدخول بنجاح ',
            ]);
        }

        return response()->json([
            'status' => 'failed',
            'class' => 'alert-danger',
            'message' => 'Failed Login the  <strong>'.$e->email.'</strong> or  <strong>Password</strong> is incorrect',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
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
