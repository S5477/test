<?php

namespace App\Http\Requests\API\Genre;

use App\Http\Requests\BaseRequest;
use App\Rules\HasGameRule;


class GenreDeleteAPIRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            return [
                'genre' => ['required', new HasGameRule($this->route('genre'))],
            ];
    }

    public function all($keys = null)
    {
        $request = parent::all();

        $request['genre'] = $this->route('genre');
        return $request;
}
}
