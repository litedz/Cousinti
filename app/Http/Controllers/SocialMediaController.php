<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use App\Models\SocialMedia;
use Exception;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $media = SocialMedia::get();

        return response()->json(['media' => $media]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, MediaRequest $mediaRequest)
    {
        $media = $mediaRequest->validated();

        try {
            SocialMedia::create($media);
        } catch (\Throwable $th) {
            throw new Exception('Error Operation', 1);
        }

        return response()->json([
            'style' => 'info',
            'message' => 'Success Opearation',
            'status' => 'Done',
            'icon' => 'check',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        $credentials = $request->validate([
            'media_id' => 'required|integer',
            'url' => 'required|url',
            'media' => 'required|alpha_dash|max:15',
        ]);
        try {
            $media = SocialMedia::findOrfail($request->media_id)->update([
                'media' => $request->media,
                'url' => $request->url,
            ]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }

        return response()->json([
            'style' => 'info',
            'message' => 'Media Updated',
            'status' => 'Updated',
            'icon' => 'check',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialMedia, Request $request)
    {
        $credentials = $request->validate([
            'media_id' => 'required|integer',
        ]);
        try {
            $update = SocialMedia::find($request->media_id)->delete();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }

        return response()->json([
            'style' => 'info',
            'message' => 'Type Deleted',
            'status' => 'Deleted',
            'icon' => 'check',
        ]);
    }
}
