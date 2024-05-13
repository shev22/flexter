<?php


namespace App\Repositories;

use App\Repositories\Repository ;


class NowPlayingRepository extends Repository
{

    public function nowPlaying($mediaType,  $pages)
    {
        return $this->tmdb('nowplaying', $mediaType, $pages);
        
    }
}
