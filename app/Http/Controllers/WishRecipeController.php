<?php

namespace App\Http\Controllers;

use App\Models\WishRecipe;
use Exception;
use Illuminate\Http\Request;

class WishRecipeController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'user_id' => 'required|integer',
            'recipe_id' => 'required|integer',
        ]);

        $checkExist = WishRecipe::where('recipe_id', $request->recipe_id)
            ->where('user_id', $request->user_id)->first();

        if (!$checkExist) {
            $addToWishList = WishRecipe::create($validate_data);
            return $addToWishList ? response()->json(['status' => 'success', 'message' => 'add to wish List',]) : throw new Exception("Error Processing ", 1);
        } else {
            throw new Exception("يوجد في  قائمة المفضلة", 1);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $wishlistUser = WishRecipe::where('user_id', $id)->get();

        return response()->json(['WishList' => $wishlistUser], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $deleteRecipeFromList = WishRecipe::where('user_id', $id)->delete();
        if (!$deleteRecipeFromList) {
            throw new Exception("Error Processing Request", 1);
        }

        return response()->json(['status' => 'Deleted'], 200);
    }
}
