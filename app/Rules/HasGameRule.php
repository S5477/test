<?php

namespace App\Rules;

use App\Models\Genre;
use Illuminate\Contracts\Validation\Rule;

class HasGameRule implements Rule
{
    /**
     * @var Genre
     *
     */
    private Genre $genre;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Genre $genre)
    {
        $this->genre = $genre;
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
        if ($this->genre->games()->first()){
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Genre has games.';
    }
}
