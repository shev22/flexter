<?php

namespace App\Repositories;
use App\Repositories\Repository;
use App\Repositories\interfaces\MovieInterface;

class AiringTodayRepository extends Repository 
{

    public function airingToday($mediaType, $pages)
    {
        return $this->tmdb('airing_today', $mediaType, $pages);
    }

  
}
