<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class types_recipesFactory extends Factory
{
    /**
     * Define the model"s default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = array("حلويات", "ملحات", "اكل صحي", "معجنات", "اكل خفيف", "الضيوف", "فطور صباح", "الغداء", "العشاء");
        return [
            'type' => array_rand(array_flip($types),1),
        ];
    }
}
