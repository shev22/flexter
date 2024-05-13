<?php


namespace App\Repositories;
use App\Repositories\Repository;

class UpComingRepository extends Repository
{
    public function upComing($mediaType, $pages)
    {
        return $this->tmdb('upcoming', $mediaType, $pages);
    }
}
