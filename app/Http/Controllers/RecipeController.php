<?php

namespace App\Http\Controllers;

use App\Events\NewRecipeEvent;
use App\Events\UpdateRatingRecipeEvent;
use App\Http\Resources\RecipeResource;
use App\Models\image;
use App\Models\ingredients;
use App\Models\likes;
use App\Models\Rating;
use App\Models\recipe;
use App\Models\types_recipes;
use App\Models\User;
use App\Rules\YoutubeRule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    private $ingredients = [];

    private $head_image;

    private $video_url = 'https://www.youtube.com/';

    private $other_images;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $recipes = RecipeResource::collection(recipe::with(['author', 'type_recipe', 'images_recipe' => function ($query) {
            $query->whereNotNull('cover')->get();
        }])->get());

        return response()->json([
            'recipes' => $recipes,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($this->validate_recipe($request) !== true) {
            return $this->validate_recipe($request);
        }

        // //  Store recipe to table
        $recipe = recipe::create([
            'name' => $request->name,
            'url_video' => $this->video_url,
            'type_id' => $request->selected_type,
            'how_todo' => $request->how_todo,
            'level' => $request->level,
            'user_id' => auth()->user()->id,
        ]);
        $recipe->save();

        if ($recipe) {
            $this->storeIngredients($recipe->id);
            $this->storeHeadImage($recipe->id);
            if (!is_null($this->other_images)) {
                $this->storeOtherImage($recipe->id);
            }

            NewRecipeEvent::dispatch(auth()->user()->id, 'Check it  : ' . $recipe->name, 'New Recipe', 'recipe', '/recipes/' . $recipe->id);
        }

        return response()->json([
            'status' => 'تم اضافة الوصفة',
            'message' => 'لقد تم اضافة الوصفة يمكنك اضافة المزيد',
            'class' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recipe  $recipe
     */
    public function show($recipe_id)
    {
        $recipe = recipe::with(['ingredient', 'approuved', 'type_recipe', 'images_recipe' => function ($query) {
            $query->orderByDesc('cover');
        }])
            ->approuved()
            ->findOrFail($recipe_id);

        return response()->json([
            'recipe' => $recipe,
        ]);
    }

    /**
     * Display all  resource.
     */
    public function types_recipe()
    {

        $types_recipe = collect(types_recipes::select('type', 'id', 'image')->get())->take(6);

        return response()->json($types_recipe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\recipe  $recipe
     */
    public function update(Request $request, $update_recipe_id)
    {

        $this->validate_recipe($request);

        $recipe_update = recipe::where('id', $update_recipe_id)->update([
            'name' => $request->name,
            'url_video' => $this->video_url,
            'type_id' => $request->selected_type,
            'how_todo' => $request->how_todo,
        ]);
        if ($recipe_update) {
            $this->storeIngredients($update_recipe_id);
            $this->UpdateImages($request, $update_recipe_id);

            return response()->json([
                'status' => 'تم',
                'message' => 'تم تحديث الوصفة بنجاح',
                'class' => 'success',
            ]);
        }
    }

    public function validate_recipe($request)
    {

        $validate_input = $request->validate([
            'name' => 'required|string',
            'ingredients' => 'required',
            'selected_type' => 'required|string',
            'url_video' => ['nullable', 'url', new YoutubeRule],
            'how_todo' => 'required|string|min:25',

        ]);
        //  Check if ingredients empty
        if (count(json_decode($request->ingredients)) === 0) {

            throw new Exception('لا يمكن اضافة وصفة بدون مكونات ', 1);
        }

        // Else Store ingredients in var ingredients
        foreach (json_decode($request->ingredients) as $item => $value) {

            array_push($this->ingredients,['name_ingredient' => $value->name_ingredient, 'quantity' => $value->quantity]);

        }

        // if request for update recipe
        if ($request->update_recipe_id) {
            $request->validate(['head_image' => 'image']); // in update must be image
        } else {
            $request->validate([
                'head_image' => 'required|image',
            ]);
        }
        // Check if  File is valid (HEAD IMAGES)

        if ($request->hasFile('head_image')) {
            if ($request->file('head_image')->isValid()) {
                $this->head_image = $request->file('head_image');
            }
        }
        // Store id of video Youtube

        $id_video_youtube = explode('https://youtu.be/', $request->url_video);
        $this->video_url = end($id_video_youtube);

        //store image in varriable other images
        for ($i = 0; $i < count($request->file()); $i++) {
            if ($request->hasFile('image_' . $i)) {
                $this->other_images['image_' . $i] = $request->file('image_' . $i);
            }
        }

        return true;
    }

    public function destroy($recipe_id)
    {
        image::where('recipe_id', $recipe_id)->delete();
        ingredients::where('recipe_id', $recipe_id)->delete();
        $recipe = recipe::find($recipe_id);
        Storage::disk('public')->deleteDirectory(auth()->user()->id . '/' . $recipe->name);
        $recipe->delete();

        return response()->json([
            'status' => 'تم حذف الوصفة بنجاح',
            'class' => 'success',
        ]);
    }

    public function UpdateImages(request $request, $recipe_id)
    {

        if ($this->head_image !== null) {
            $CheckHeadImage = image::where('recipe_id', $recipe_id)->where('cover', 'active')->firstOr(function () {
                throw new Exception('Not found ', 1);
            });

            if ($CheckHeadImage) {
                $deletePrevImage = image::find($CheckHeadImage->id)->delete();
                $this->storeHeadImage($recipe_id);
            }
        }
        if ($this->other_images !== null) {
            $CheckOtherImages = image::where('recipe_id', $recipe_id)->whereNull('cover')->get();
            if (count($CheckOtherImages) + count($this->other_images) > 3) { // Check if Recipe had +3 files
                throw new Exception('لا يمكنك رفع اكثر من 3 صورة ', 1);
            } else {
                $this->storeOtherImage($recipe_id);
            }
        }
    }

    public function storeIngredients($recipe_id)
    {

        $delete_ingredients = ingredients::where('recipe_id', $recipe_id)->delete();
        // // store Ingredient
        for ($i = 0; $i < count($this->ingredients); $i++) {
            $insert = ingredients::create([
                'name_ingredient' => $this->ingredients[$i]['name_ingredient'],
                'quantity' => $this->ingredients[$i]['quantity'],
                'recipe_id' => $recipe_id,
            ]);
            $insert->save();
        }
    }

    public function storeHeadImage($recipe_id)
    {
        $head_img = $this->head_image->store('recipes', 'public'); // Head Images
        $head_image_name = explode('/', $head_img);

        $save_head_image = image::create([
            'name' => end($head_image_name), //get the name of Head image stored
            'cover' => 'active', //get the name of image stored
            'recipe_id' => $recipe_id,
        ]);
        $save_head_image->save();
    }

    public function storeOtherImage($recipe_id)
    {
        foreach ($this->other_images as $key => $val) {
            $image = $val->store('recipes', 'public'); //Store other images
            $name_image = explode('/', $image);
            $save_other_images = image::create([
                'name' => end($name_image), //get the name of image stored
                'recipe_id' => $recipe_id,
            ]);
            $save_other_images->save();
        }
    }

    public function RemovePrevImage($image_id)
    {
        $image_name = image::find($image_id);
        $delete_in_storage = Storage::disk('public')->delete('recipes/' . $image_name->name);
        $delete_in_Db = $image_name->delete();

        if ($delete_in_storage && $delete_in_Db) {
            return response([
                'status' => 'تم',
                'message' => 'تم حذف الصورة',
                'class' => 'info',
            ], 200);
        }
    }

    /**
     * Add Like to the Recipe Or DisLike if isLiked
     */
    public function AddOrRemoveLike(request $request)
    {

        $val = $request->validate([
            'recipe_id' => 'required',
        ]);

        $CheckLikedRecipe = likes::firstWhere('user_id', auth()->user()->id);

        // remove like if its recipe liked before
        if (isset($CheckLikedRecipe)) {
            return $this->removeLike(auth()->user()->id, $request->recipe_id);
        }

        $addLike = likes::create([
            'user_id' => auth()->user()->id,
            'recipe_id' => $request->recipe_id,
            'like' => 1,
        ]);

        //Update Rating
        UpdateRatingRecipeEvent::dispatch($request->recipe_id);

        return response()->json([
            'status' => 'تم',
            'message' => 'اعجاب',
            'style' => 'info',
            'icon' => 'fa-thumbs-up',
        ]);
    }

    public function removeLike($user_id, $recipe_id)
    {

        $RemoveLike = likes::where('user_id', $user_id)->where('recipe_id', $recipe_id)->delete();

        if ($RemoveLike) {
            //Update Rating
            UpdateRatingRecipeEvent::dispatch($recipe_id);
        }

        return $RemoveLike ? response()->json([
            'status' => 'حذف',
            'message' => 'تم حذف الاعجاب',
            'style' => 'warning',
            'icon' => 'thumbs-downo',
        ]) : throw new Exception('Something wrong with request', 1);
    }
    /**
     * Check if User is liked this recipe before
     */

    public function IsLiked(Request $request, int $recipe_id)
    {

        $Isliked = likes::where('user_id', 20)->where('recipe_id', $recipe_id)->first();
        return $Isliked ? response()->json(true) : response()->json(false);
    }
    /**
     * Show Likes Recipe
     */

    public function CountLikes(Request $request, int $recipe_id)
    {
        $likes = likes::where('recipe_id', $recipe_id)->get();
        return $likes ? response()->json(['likes' => $likes->count()]) : response()->json(false);
    }
    /**
     * Show All Recipes user
     */
    public function recipes_user()
    {

        return response()->json(RecipeResource::collection(recipe::with(['author', 'type_recipe', 'images_recipe' => function ($query) {
            $query->whereNotNull('cover')->get();
        }])
            ->where('user_id', auth()->user()->id)
            ->whereHas('images_recipe')
            ->get()));
    }

    public function search_recipe(Request $e, $type)
    {
        if (isset($e->SearchBy) && $e->SearchBy == 'type') {
            $type_id = types_recipes::where('type', $type)->first()->id;

            return response()->json(RecipeResource::collection(recipe::with(['author', 'images_recipe' => function ($query) {
                $query->whereNotNull('cover')->get();
            }])->where('type_id', $type_id)->get()));
        } else {
            return response()->json(RecipeResource::collection(recipe::with(['author', 'images_recipe' => function ($query) {
                $query->whereNotNull('cover')->get();
            }])->where('name', 'like', '%' . $type . '%')->get()));
        }
    }

    public function filterBy($key)
    {
        $this->authorize('IsAdmin', 'App\Model\admin');
    }

    public function addToWishList()
    {
    }
}
