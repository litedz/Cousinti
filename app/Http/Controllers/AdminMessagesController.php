<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Mail\SendMailToUser;
use App\Models\admin_messages;
use App\Models\message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class AdminMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {


        // if (!Gate::allows('IsSuperAdmin', 'App\\Models\admin')) {
        //     throw new Exception("You Dont have Permission for this action ", 1);
        // }

        $messages = admin_messages::all();

        return response()->json($messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store()
    {

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }

    public function ReplyMessage(Request $request)
    {

        $credentials = $request->validate([
            'to_user_id' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $recipient = User::find($request->to_user_id);
        try {
            Mail::to('maamarjoker@gmail.com')->send(new SendMailToUser($recipient->username, $request->subject, $request->body));
        } catch (\Throwable $th) {
            throw new Exception("Error Reply Message", 404);
        }

        return response()->json(['message' => 'Mail Send'], 200);
    }
}
