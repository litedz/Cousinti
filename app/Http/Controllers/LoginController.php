<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL as FacadesURL;
use PharIo\Manifest\Url;

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
        if (Auth::attempt(['email' => $e->email, 'password' => $e->password], true)) {
            $user = User::select('id')->where('email', $e->email)->get();
            Auth::loginUsingId($user);
            return response()->json([
                'status' => 'logged',
                'class' => 'alert-success',
                'message' => 'تم الدخول بنجاح',
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
}
