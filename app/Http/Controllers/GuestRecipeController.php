<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use App\Listeners\TestListener;
use App\Models\recipe;
use App\Models\types_recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class GuestRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {


        $recipes = collect(recipe::with(['author', 'type_recipe', 'images_recipe' => function ($query) {
            $query->whereNotNull('cover')->get();
        }])->whereHas('images_recipe')->get());


        return response()->json(["recipes" => $recipes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     */
    public function show($id)
    {
        $recipe = recipe::with(['ingredient', 'recipes_liked', 'type_recipe', 'images_recipe'  => function ($query) {
            $query->orderByDesc('cover');
        }])->findOrFail($id);
        return response()->json([
            'recipe' => $recipe,
        ]);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filter(request $e, $type)
    {
        if (isset($e->SearchBy) && $e->SearchBy == 'type') {
            $type_id = types_recipes::where('type', $type)->first()->id;

            $recipes = RecipeResource::collection(recipe::with([
                'author', 'images_recipe' => function ($query) {
                    $query->whereNotNull('cover')->get();
                }
            ])
                ->where('type_id', $type_id)
                ->whereHas('images_recipe')
                ->get());
            return response()->json($recipes);
        }
    }

    public function search($type)
    {
        return response()->json(RecipeResource::collection(recipe::with(['author', 'images_recipe' => function ($query) {
            $query->whereNotNull('cover')->get();
        }])->where('name', 'like', '%' . $type . '%')->get()));
    }

}
