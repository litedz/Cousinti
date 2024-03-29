<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Exception;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(notification $notification)
    {

        $notification = notification::where('recipient_id', auth()->user()->id)->get();

        return response()->json(collect($notification)->sortBy('status')->values());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notification $notification)
    {
        $request->validate([
            'notification_id' => 'required',
        ]);
        try {
            $update_status = notification::find($request->notification_id);
            $update_status->isRead = true;
            $update_status->save();
        } catch (\Throwable $th) {
            throw new Exception('Error Processing Request', 1);
        }

        return response()->json('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(notification $notification, Request $request)
    {
        $request->validate([
            'notification_id' => 'required',
        ]);
        try {
            $update_status = notification::find($request->notification_id)->delete();
        } catch (\Throwable $th) {
            throw new Exception('Error Processing Request', 1);
        }

        return response()->json([
            'message' => 'Notification Deleted',
            'status' => 'Delete',
            'style' => 'info',
            'icon' => 'check'
        ]);
    }
}
