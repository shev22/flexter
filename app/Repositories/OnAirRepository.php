<?php


namespace App\Repositories;

use App\Repositories\Repository ;


class OnAirRepository extends Repository
{

    public function onAir($mediaType,  $pages)
    {
        return $this->tmdb('onair', $mediaType, $pages);
    }
}
