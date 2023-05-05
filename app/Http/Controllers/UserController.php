<?php

namespace App\Http\Controllers;

use App\Jobs\Subscribe as JobsSubscribe;
use App\Models\comments;
use App\Models\Profile;
use App\Models\Rating;
use App\Models\recipe;
use App\Models\Subscribe;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
        return response()->json('created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'age' => 'required|integer|min:15',
            'avatar' => 'required|image',
        ]);

        if ($request->file('avatar')->isValid()) {
            $storage_image = $request->file('avatar')->store('avatars', 'public');
        }
        $valid['phone'] = $request->phone;
        $valid['avatar'] = $storage_image;
        $valid['password'] = Hash::make($request->password);
        $checkUser = User::where('email', $request->email)->first();
        if ($checkUser !== null) {
            throw new Exception('يوجد حساب بهذا الايمايل ', 1);
        }
        $store = User::create($valid);
        if ($store) {
            //create profile
            $profile = Profile::factory()->create();

            $profile_id = $profile ? $profile->id : throw new Exception('Error Processing Request', 1);
            User::where('id', $store->id)->update([
                'profile_id' => $profile_id,
            ]);

            return response()->json('created');
        } else {
            throw new Exception('يوجد خطا في التسجيل يرجى المحاولة من جديد ', 1);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return response()->json(['profile' => collect($user)->except(['id', 'created_at', 'updated_at'])]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $user_id Required
     */
    public function update(User $user, Request $request, $user_id)
    {

        $valid = $request->validate([
            'username' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'age' => 'required|integer|min:15',
        ]);
        $update_User = User::where('id', $user_id)->update($valid);

        if ($update_User) {
            return response()->json('updated');
        } else {
            throw new Exception('تمت خطا في التحديث', 1);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function updateAvatar(request $request)
    {

        $delete_prev_avatar = Storage::disk('public')->delete($request->prev_avatar);
        $store_new_avatar = $request->file('new_avatar')->store('avatars', 'public');
        if ($store_new_avatar) {

            User::where('id', auth()->user()->id)->update([
                'avatar' => $store_new_avatar,
            ]);

            return response()->json('updated');
        }
    }

    public function changePassword(request $request, User $user_id)
    {

        $validate = $request->validate([
            'currentPassword' => 'required|current_password',
        ]);
        $user = User::find(auth()->user()->id);
        if (Hash::check($request->currentPassword, $user->password)) {
            $validate_password = $request->validate([
                'newPassword' => 'required',
                'confirmPassword' => 'required|same:newPassword',
            ]);

            $changepassword = $user->update([
                'password' => Hash::make($request->newPassword),
            ]);
            if ($changepassword) {
                return response()->json('updated');
            }
        }
    }

    public function RecipeUserLiked(Request $request)
    {

        $liked = Rating::where('user_id', auth()->user()->id)->where('recipe_id', $request->recipe_id)->get();
        if (count($liked) == 0) {
            return response()->json(['liked' => false]);
        } else {
            return response()->json(['liked' => true]);
        }
    }

    public function RegisterWithFace(Request $e)
    {

        $valid = $e->validate([
            'email' => 'required|email',
            'UserIdFace' => 'required|integer',
            'age' => 'integer|max:100|min:10',
            'username' => 'required',
        ]);
        try {
            $store_User = User::create([
                'Id_user_media' => Hash::make($e->UserIdFace),
                'username' => $e->username,
                'email' => $e->email,
                'age' => $e->age,
                'avatar' => $e->avatar,
            ]);
            $store_User->save();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        if ($store_User) {
            return response()->json('created');
        }
    }

    public function Subscribe(Subscribe $subscribe, Request $e)
    {
        $validate = $e->validate([
            'email' => 'required|email|max:255',
        ]);
        $exist_email = Subscribe::where('email', $e->email)->first();
        if ($exist_email) {
            throw new Exception('You have already account with this email please login in');
        }

        $subscribed = JobsSubscribe::dispatch($e->email);

        return $subscribed ? response()->json('تم الاشتراك معنا في الموقع بنجاح') : throw new Exception('Error Processing Request', 1);
    }

    public function LastActivity()
    {
        $last_recipes = recipe::where('user_id', 20)->get();
        $last_comments = comments::with('recipe')->where('user_id', 20)->get();

        $last_activitys = collect($last_comments)->merge($last_recipes)->sortByDesc('created_at')->values();

        return response()->json($last_activitys);
    }
}
