<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Services\GameService;

/**
 * Requests
 */
use App\Http\Requests\API\Game\GameUpdateAPIRequest;
use App\Http\Requests\API\Game\GameStoreAPIRequest;
use App\Http\Requests\API\Genre\GameDeleteGenreAPIRequest;
use App\Http\Requests\API\Game\GameIndexAPIRequest;

class GameAPIController extends Controller
{
    private GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    /**
     * @param GameIndexAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(GameIndexAPIRequest $request) {
        $response = $this->gameService->list($request->validated());

        return $this->apiResponse($response);
    }

    /**
     * @param GameIndexAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Game $game) {
        $response = $this->gameService->show($game);

        return $this->apiResponse($response);
    }

    /**
     * @param GameIndexAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(GameStoreAPIRequest $request) {
        $response = $this->gameService->store($request->validated());

        return $this->apiResponseCreated($response);
    }

    /**
     * @param GameIndexAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(GameUpdateAPIRequest $request, Game $game) {
        $response = $this->gameService->update($request->validated(), $game);

        return $this->apiResponse($response);
    }

    /**
     * @param GameIndexAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Game $game) {
        $this->gameService->delete($game);

        return $this->apiResponse();
    }

    /**
     * @param GameIndexAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function genreAdd(GameDeleteGenreAPIRequest $request, Game $game) {
        $response = $this->gameService->genreAdd($request->validated(), $game);

        return $this->apiResponse($response);
    }

    /**
     * @param GameIndexAPIRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function genreRemove(GameDeleteGenreAPIRequest $request, Game $game) {
        $response = $this->gameService->genreRemove($request->validated(), $game);

        return $this->apiResponse($response);
    }
}
