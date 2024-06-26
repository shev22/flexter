<?php

namespace App\Repositories;
use App\Repositories\Repository;

class TopRatedRepository extends Repository
{

    public function topRated($mediaType,  $pages)
    {
        return $this->tmdb('top_rated', $mediaType, $pages);
    }
}
