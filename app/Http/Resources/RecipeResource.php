<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeResource extends JsonResource
{



    public $preserveKeys = false;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'ingredient' => IngredienResource::collection($this->whenLoaded('ingredient')),
            'images_recipe' => $this->images_recipe,
            'author' => $this->author,
            'type_recipe' => $this->type_recipe,
        ];
    }
}
