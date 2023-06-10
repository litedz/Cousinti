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
    public function store(Request $MessageRequest)
    {

        $Message = $MessageRequest->validate([
            'body' => 'required',
            'recipient_id' => 'required',
            'from' => 'email|required',
        ]);

        try {
            message::create($Message);
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

        return response()->json(collect($message_user)->sortByDesc('created_at')->values());
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, message $message)
    {
        $request->validate([
            'message_id' => 'required',
        ]);
        try {
            $update_status = message::find($request->message_id);
            $update_status->isRead = true;
            $update_status->save();
        } catch (\Throwable $th) {
            throw new Exception('Error Update Message', 1);
        }

        return response()->json('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(message $message, Request $request)
    {

        $request->validate([
            'message_id' => 'required|integer',
        ]);

        try {
            message::find($request->message_id)->delete();

            return response()->json([
                'status' => 'Deleted',
                'message' => 'Message Deleted',
                'icon' => 'block',
                'style' => 'warning',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
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
