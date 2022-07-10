<?php

namespace App\Http\Requests\API\Game;

use App\Http\Requests\BaseRequest;


class GameStoreAPIRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            return [
                'game'        => ['required'],
                'game.name'   => ['required', 'string', 'min:1'],
                'game.studio' => ['required', 'string', 'min:1'],
                'genres'      => ['required'],
                'genres.*'    => ['required', 'exists:genres,code'],
            ];
    }
}
