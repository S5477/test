<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

/**
 * Requests
 */
use App\Http\Requests\API\Game\GameIndexAPIRequest;
use App\Http\Requests\API\Genre\GenreDeleteAPIRequest;
use App\Models\Genre;
use App\Services\GenreService;

class GenreAPIController extends Controller
{
    private GenreService $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $response = $this->genreService->list();

        return $this->apiResponse($response);
    }

    /**
     * @param Genre $genre
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(GenreDeleteAPIRequest $request, Genre $genre) {
        $this->genreService->delete($genre);

        return $this->apiResponse();
    }

}
