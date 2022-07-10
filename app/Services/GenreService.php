<?php

namespace App\Services;

use App\Http\Resources\GenreResource;
use App\Repositories\GenreRepository;

class GenreService
{
    private GenreRepository $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list() {
        $list = $this->genreRepository->list();

        return GenreResource::collection($list);
    }
}
