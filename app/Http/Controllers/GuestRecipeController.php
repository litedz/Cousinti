<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use App\Models\recipe;
use App\Models\types_recipes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestRecipeController extends Controller
{
    protected $UserMostPosted;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = collect(recipe::with(['author', 'comments', 'type_recipe', 'images_recipe' => function ($query) {
            $query->whereNotNull('cover')->get();
        }])
            ->whereHas('images_recipe')
            ->get());

        $RecipeMostComment = collect(recipe::with('comments')->whereHas('comments')->get())->sortByDesc('comments')->take(2);
        $UserMostPosted = collect(User::with(['recipes', 'rank'])->whereHas('recipes')->get())->sortByDesc('recipes')->take(7);
        $BestRecipe = recipe::with(['type_recipe', 'images_recipe'])->orderByDesc('like')->limit(3)->get();
        $recipesOfMonth = recipe::with(['type_recipe', 'images_recipe'])->whereMonth('created_at', Carbon::now()->format('m'))->limit(6)->get();
        $RatingRecipe = recipe::with(['type_recipe', 'images_recipe'])->orderByDesc('rating')->limit(5)->get();
        $LatestRecipes = Recipe::with('images_recipe')->whereHas('images_recipe')->latestRecipe()->orderBy('created_at')->limit(4)->get();

        return response()->json([
            'recipes' => $recipes,
            'MostComment' => $RecipeMostComment,
            'UserMostPosted' => $UserMostPosted,
            'BestRecipe' => $BestRecipe,
            'recipesOfMonth' => $recipesOfMonth,
            'RatingRecipe' => $RatingRecipe,
            'LatestRecipes' => $LatestRecipes,
        ]);
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
     * @param  int  $id
     */
    public function show($id)
    {
        $recipe = recipe::with(['ingredient', 'recipes_liked', 'type_recipe', 'images_recipe' => function ($query) {
            $query->orderByDesc('cover');
        }])->findOrFail($id);

        return response()->json([
            'recipe' => $recipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
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
                },
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
        }])->where('name', 'like', '%'.$type.'%')->get()));
    }
}
