<?php

namespace App\Http\Requests\API\Game;

use App\Http\Requests\BaseRequest;


class GameUpdateAPIRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            return [
                'name'   => ['sometimes', 'string', 'min:1'],
                'studio' => ['sometimes', 'string', 'min:1'],
            ];
    }
}
