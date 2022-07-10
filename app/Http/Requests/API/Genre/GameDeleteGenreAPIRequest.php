<?php

namespace App\Http\Requests\API\Genre;

use App\Http\Requests\BaseRequest;


class GameDeleteGenreAPIRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            return [
                'genres'     => ['required'],
                'genres.*'   => ['required', 'exists:genres,code'],
            ];
    }
}
