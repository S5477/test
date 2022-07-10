<?php

namespace App\Repositories;

use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GameRepository
{
    /**
     * @param $data
     * @return mixed
     *
     * P.S Добавил пагинацию, т.к она обычно везде присутсвует
     */
    public function list($data){
        $list = isset($data["genres"])
            ? Game::whereHas("genres", function ($q) use ($data) {
                return $q->whereIn("code", $data["genres"]);
            })
            : Game::query();

        $list->with("genres")
            ->orderByDesc("created_at");

        $count = $list->count();

        $list = $list->skip($data["skip"])
            ->take($data["take"])
            ->get();

        return ["count" => $count, "list" => $list];
    }

    /**
     * @param $data
     * @return mixed
     *
     * P.S сделал в одном методе, т.к в задание не указанно как именно сделать.
     * В идеале лучше разделить, если это возможно по логике приложения
     */
    public function create($data)
    {

        $game = DB::transaction(function () use ($data) {
            /**
             * @var Game $game
             */
            $game =  Game::create($data["game"]);

            $genres = $this->getGenres($data["genres"]);

            foreach ($genres as $genre) {
                $game->genres()->attach($genre);
            }

            return $game;
        });

        return $game;
    }

    /**
     * @param $genres
     * @return mixed
     */
    public function getGenres($genres){
        $list = (new GenreRepository())->getByCodes($genres);

        return $list;
    }

    /**
     * @param $data
     * @param Game $game
     * @return Game
     */
    public function update($data, Game $game)
    {
        $game->update($data);
        $game->refresh();

        return $game;
    }
}
