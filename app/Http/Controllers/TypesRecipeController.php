<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypesRequest;
use App\Models\types_recipes;
use Exception;
use Illuminate\Http\Request;

class TypesRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $types = types_recipes::get();
        return response()->json(['types' => $types]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypesRequest $request)
    {
        $type = $request->validated();

        try {
            types_recipes::create($type);
        } catch (\Throwable $th) {
            throw new Exception('Error Opration', 1);
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
     * @param  \App\Models\types_recipes  $types_recipes
     * @return \Illuminate\Http\Response
     */
    public function show(types_recipes $types_recipes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\types_recipes  $types_recipes
     * @return \Illuminate\Http\Response
     */
    public function edit(types_recipes $types_recipes)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\types_recipes  $types_recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, types_recipes $types_recipes)
    {
        $credentials = $request->validate([
            'type_id' => 'required|integer',
            'type' => 'required|alpha|max:15'
        ]);

        try {
            $type = types_recipes::findOrfail($request->type_id)->update($credentials);
            $type->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\types_recipes  $types_recipes
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(types_recipes $types_recipes, Request $request)
    {
        $credentials = $request->validate([
            'type_id' => 'required|integer'
        ]);
        try {
            $update = types_recipes::find($request->type_id)->delete();
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
