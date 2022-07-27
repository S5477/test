<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            [
                "name" => "экшен",
                "code" => "action"
            ],
            [
                "name" => "симуляция",
                "code" => "simulation"
            ],
            [
                "name" => "стратегии",
                "code" => "strategy"
            ],
            [
                "name" => "ролевые",
                "code" => "rpg"
            ],
            [
                "name" => "фентези",
                "code" => "fantasy"
            ],
            [
                "name" => "аркады",
                "code" => "arcade"
            ],
        ];

        DB::table('genres')->insert($genres);
    }
}
