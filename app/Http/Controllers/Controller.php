<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\ThrowValidationErrorTrait;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ThrowValidationErrorTrait;


    /**
     * @param $data
     * @return JsonResponse
     */
    public function apiResponse($data = null)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function apiResponseCreated($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ])->setStatusCode(201);
    }
}
