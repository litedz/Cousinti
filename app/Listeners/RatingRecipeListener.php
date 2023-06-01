<?php

namespace App\Listeners;

use App\Events\UpdateRatingRecipeEvent;
use App\Models\likes;
use App\Models\Rating;
use App\Models\User;

class RatingRecipeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(UpdateRatingRecipeEvent $event)
    {
        $users = User::get()->count();

        $likes = likes::where('recipe_id', $event->recipe_id)->get()->count();

        $update_rating = Rating::where('recipe_id', $event->recipe_id)->updateOrCreate(
            ['recipe_id' => $event->recipe_id],
            ['rating' => ($likes * 100) / $users, 'recipe_id' => $event->recipe_id],
        );
    }
}
