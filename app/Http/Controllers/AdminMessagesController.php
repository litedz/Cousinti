<?php

namespace App\Http\Controllers;

use App\Events\MessageReceivedEvent;
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
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(message $message, Request $request)
    {
        $val = $request->validate([
            'message_id' => 'required|integer',
        ]);

        try {
            $deleteMessage = admin_messages::find($request->message_id)->delete();

            return response()->json(['message' => 'Message Deleted']);
        } catch (\Throwable $th) {
            throw $th;
        }
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
            Mail::to($recipient->email)->send(new SendMailToUser($recipient->username, $request->subject, $request->body));
        } catch (\Throwable $th) {
            throw new Exception('Error Reply Message', 404);
        }

        return response()->json(['message' => 'Mail Send'], 200);
    }

    public function MessageUser(Request $request)
    {
        $credentials = $request->validate([
            'user_id' => 'required_if:sendToAll,false',
            'subject' => 'required',
            'body' => 'required',
            'sendToAll' => 'required',
        ]);
        try {
            if ($request->sendToAll === 'true') {
                foreach (User::all() as $key => $user) {
                    $user_id = $user->id;
                    $autoReply = MessageReceivedEvent::dispatch($user_id, 'admin@support.com', $request->body);
                }
            } else {
                $autoReply = MessageReceivedEvent::dispatch($request->user_id, 'admin@support.com', $request->body);
            }
        } catch (\Throwable $th) {
            throw new Exception('Error Sending Message', 404);
        }

        return response()->json(['message' => 'Message Send'], 200);
    }
}
