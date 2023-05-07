<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YoutubeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        return ($attribute && $value !== null) && (str_contains($value, 'https://youtu.be/') || str_contains($value, 'https://www.youtube.com'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'يجب ان يكون رابط الفيديوا صحيح.';
    }
}
