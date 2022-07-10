<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

trait ThrowValidationErrorTrait
{
    /**
     * @param $field
     * @param array $messages
     * @throws ValidationException
     */
    public function throwValidationError($field, $messages = [])
    {
        throw new HttpResponseException(response()->json([$field => $messages], 422));
    }

    /**
     * @param $field
     * @param array $messages
     * @throws ValidationException
     */
    public function throwValidationErrorNotCreated($field, $messages = [])
    {
        throw new HttpResponseException(response()->json([ 'is_created' => false, $field => $messages], 422));
    }
}
