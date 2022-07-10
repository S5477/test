<?php

namespace App\Repositories;

use App\Models\Genre;

class GenreRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(){
        $list = Genre::all();

        return $list;
    }

    /**
     * @param $codes
     * @return mixed
     */
    public function getByCodes($codes){
        $list = Genre::whereIn("code", $codes)->get();

        return $list;
    }
}
