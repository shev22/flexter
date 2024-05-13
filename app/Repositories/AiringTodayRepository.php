<?php

namespace App\Repositories;
use App\Repositories\Repository;

class AiringTodayRepository extends Repository
{

    public function airingToday($mediaType, $pages)
    {
        return $this->tmdb('airingtoday', $mediaType, $pages);
    }
}
