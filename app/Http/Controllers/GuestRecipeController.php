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
            ->where('is_approved',true)
            ->orderByDesc('id')
            ->get());

        $RecipeMostComment = collect(recipe::with(['comments'])->whereHas('comments')->whereHas('images_recipe')->limit(2)->get())->sortByDesc('comments');
        $UserMostPosted = collect(User::with(['recipes', 'rank'])->whereHas('recipes')->get())->sortByDesc('recipes')->take(7);
        $BestRecipe = recipe::with(['type_recipe', 'images_recipe'])->orderByDesc('like')->limit(3)->get();
        $recipesOfMonth = recipe::with(['type_recipe', 'images_recipe'])->whereMonth('created_at', Carbon::now()->format('m'))->limit(6)->get();
        $RatingRecipe = recipe::with(['type_recipe', 'images_recipe'])->orderByDesc('rating')->limit(5)->get();

        return response()->json([
            'recipes' => $recipes,
            'MostComment' => $RecipeMostComment,
            'UserMostPosted' => $UserMostPosted,
            'BestRecipe' => $BestRecipe,
            'recipesOfMonth' => $recipesOfMonth,
            'RatingRecipe' => $RatingRecipe,
            'LatestRecipes' => $this->LatestRecipes(),
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

        $type = types_recipes::where('type', $type)->firstOrFail();

        $recipes = RecipeResource::collection(recipe::with(['author', 'type_recipe', 'images_recipe'])
            ->where('type_id', $type->id)
            ->whereHas('images_recipe')
            ->get());

        return response()->json($recipes);
    }

    public function search($type)
    {
        $recipes_found = RecipeResource::collection(recipe::with(['author', 'images_recipe' => function ($query) {
            $query->whereNotNull('cover')->get();
        }])
            ->whereHas('images_recipe')
            ->where('name', 'like', '%'.$type.'%')->get());

        return response()->json($recipes_found);
    }

    public function LatestRecipes()
    {
        $LatestRecipes = recipe::with('images_recipe')->whereHas('images_recipe')->latestRecipe()->orderBy('created_at')->limit(4)->get();

        return $LatestRecipes;
    }

    public function randomRecipe()
    {

        $random = collect(recipe::with(['author', 'ingredient', 'images_recipe' => function ($query) {
            $query->whereNotNull('cover')->get();
        }])
            ->whereHas('images_recipe')
            ->get())->random(1);

        return response()->json([
            'random_recipe' => $random,
        ]);
    }
}
