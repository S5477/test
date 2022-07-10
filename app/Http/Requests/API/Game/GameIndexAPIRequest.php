<?php

namespace App\Http\Requests\API\Game;

use App\Http\Requests\BaseRequest;


class GameIndexAPIRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            return [
                'genres'     => ['sometimes'],
                'genres.*'   => ['sometimes', 'exists:genres,code'],
                'take'       => ['required', 'integer'],
                'skip'       => ['required', 'integer'],
            ];
    }
}
