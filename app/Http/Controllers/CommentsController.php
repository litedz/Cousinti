<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        dd('xxxx');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\jsonResponse
     */
    public function store(Request $request)
    {

        $validate_comment = $request->validate([
            'comment'  => 'required|string',
        ]);
        $add_comment = comments::create([
            'comment' => $request->comment,
            'user_id' => auth()->user()->id,
            'recipe_id' => $request->recipe_id,
        ]);
        $add_comment->save();
        return response()->json('Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $recipe_id = $request->comment;
        $recipe_comments = comments::with(['user'])->where('recipe_id', $recipe_id)->paginate(4);
        return response()->json($recipe_comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(comments $comments)
    {
        //
    }
}
