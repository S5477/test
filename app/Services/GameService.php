<?php

namespace App\Services;

use App\Http\Resources\GameResource;
use App\Models\Genre;
use App\Repositories\GameRepository;
use App\Models\Game;

class GameService
{
    private GameRepository $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }


    /**
     * @param $data
     * @return array
     */
    public function list($data) {
        $list = $this->gameRepository->list($data);

        return ["games" => GameResource::collection($list['list']), "count" => $list['count']];
    }

    /**
     * @param $game
     * @return GameResource
     */
    public function show(Game $game) {
        return new GameResource($game);
    }

    /**
     * @param $data
     * @return GameResource
     */
    public function store($data)
    {
        $game = $this->gameRepository->create($data);

        return new GameResource($game);
    }

    /**
     * @param $data
     * @param Game $game
     * @return GameResource
     */
    public function update($data, Game $game)
    {
        $game = $this->gameRepository->update($data,$game);

        return new GameResource($game);
    }

    /**
     * @param Game $game
     */
    public function delete(Game $game)
    {
        $game->delete();
    }

    /**
     * @param $data
     * @param Game $game
     * @return GameResource
     */
    public function genreAdd($data, Game $game)
    {
        $genres = $this->gameRepository->getGenres($data["genres"]);

        foreach ($genres as $genre) {
            if (!$this->checkGenre($game, $genre)) $game->genres()->attach($genre);
        }

        return new GameResource($game);
    }

    /**
     * @param Game $game
     * @param Genre $genre
     * @return bool
     */
    private function checkGenre(Game $game, Genre $genre) {
        return $game->genres()->wherePivot('genre_id', $genre->id)->exists();
    }
    /**
     * @param $data
     * @param Game $game
     * @return GameResource
     */
    public function genreRemove($data, Game $game)
    {
        $genres = $this->gameRepository->getGenres($data["genres"]);

        foreach ($genres as $genre) {
            $game->genres()->detach($genre);
        }

        return new GameResource($game);
    }
}
