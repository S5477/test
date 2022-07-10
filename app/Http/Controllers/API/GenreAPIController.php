<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

/**
 * Requests
 */
use App\Http\Requests\API\Game\GameIndexAPIRequest;
use App\Services\GenreService;

class GenreAPIController extends Controller
{
    private GenreService $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    /**
     * @param GameIndexAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $response = $this->genreService->list();

        return $this->apiResponse($response);
    }

}
