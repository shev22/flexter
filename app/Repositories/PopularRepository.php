<?php

namespace App\Repositories;

use App\Repositories\Repository;


class PopularRepository extends Repository
{
    public function popular($mediaType, $pages)
    {
       return($this->tmdb('popular', $mediaType, $pages)) ;
    }
}
