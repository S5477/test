<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = [
            [
                "name"   => "Heroes of Might and Magic III",
                "studio" => "New World Computing",
                "genres" => [
                    "strategy",
                    "fantasy"
                ]
            ],
            [
                "name"   => "Stronghold Crusader",
                "studio" => "Firefly Studios",
                "genres" => [
                    "strategy",
                    "simulation"
                ]
            ],
            [
                "name"   => "The Elder Scrolls 5: Skyrim",
                "studio" => "Bethesda Game Studios",
                "genres" => [
                    "rpg",
                    "action",
                    "fantasy"
                ]
            ],
            [
                "name"   => "Kingdom Come: Deliverance",
                "studio" => "Warhorse Studios",
                "genres" => [
                    "rpg",
                    "action"
                ]
            ],
            [
                "name"   => "Ведьмак",
                "studio" => "CD Projekt RED",
                "genres" => [
                    "rpg",
                    "action"
                ]
            ],
            [
                "name"   => "Microsoft Flight Simulator",
                "studio" => "3DO",
                "genres" => [
                    "simulation"
                ]
            ],
        ];

        foreach ($games as $game) {
           $newGameId = DB::table('games')->insertGetId([
               "name"   => $game["name"],
               "studio" => $game["studio"],
           ]);

            /**
             * @var Game $newGame
             */
           $newGame = Game::find($newGameId);

           foreach ($game["genres"] as $genreCode) {
               $genre = Genre::where("code", $genreCode)->first();

               $newGame->genres()->attach($genre);
           }
        }
    }
}
