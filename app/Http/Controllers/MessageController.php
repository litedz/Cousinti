<?php

namespace App\Http\Controllers;

use App\Events\MessageReceivedEvent;
use App\Http\Requests\MessageRequest;
use App\Models\admin_messages;
use App\Models\message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public string $reply_message;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, message $message)
    {

        $messages = message::all();
        MessageReceivedEvent::dispatch(
            1,
            'admin@support.com',
            'Thank you for your message. We appreciate you taking the time to reach out to us will respond to it as soon as'
        );

        return response()->json($messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $MessageRequest)
    {

        $Message = $MessageRequest->validated();

        try {
            admin_messages::create($Message);
            MessageReceivedEvent::dispatch(
                20,
                'admin@support.com',
                'Thank you for your message. We appreciate you taking the time to reach out to us will respond to it as soon as'
            );
        } catch (\Throwable $th) {
            throw new Exception('Error Send Message', 1);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        $message_user = message::where('recipient_id', $request->message)->get();

        return response()->json($message_user);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }

    public function conversation(Request $request)
    {

        // $validateData = $request->validate([
        //     'user_id_send' => 'required|numeric',
        //     'user_id_recipient' => 'required|numeric',
        // ]);

        // $chat = message::with('user')->whereIn('id_user_send', [$request->user_id_send, $request->user_id_recipient])
        //     ->whereIn('id_user_recipient', [$request->user_id_send, $request->user_id_recipient])
        //     ->latest()
        //     ->get();

        // return response()->json($chat, 200);
    }

    public function ContactSuport(Request $request, MessageRequest $messageRequest)
    {
        $Message = $messageRequest->validated();

        try {
            admin_messages::create($Message);
            $autoReply = MessageReceivedEvent::dispatch(
                auth()->user()->id,
                'admin@support.com',
                'Thank you for your message. We appreciate you taking the time to reach out to us will respond to it as soon as'
            );
            if ($autoReply) {
                return response()->json('Message Send');
            }
        } catch (\Throwable $th) {
            throw new Exception('Error Send Message', 1);
        }
    }
}
