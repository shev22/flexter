<?php


namespace App\Repositories;

use App\Models\Repository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Repositories\traits\LogoTrait;

class TrendingRepository
{
    use LogoTrait;

    public function trending($mediaType, $period)
    {
        $time = time();
        $statistics = [
            'repository' => 'trending-' . $mediaType,
            'quantity' => null,
            'duration' => null,
            'status' => null,
            'error_message' => null,
            'date' => Carbon::now()->format('d-m-y'),
        ];

      
        try {

            $media = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/trending/' . $mediaType . '/' . $period)
                ->json()['results'];
            if ($mediaType == 'all') {
                $media = collect($media)->map(function ($movie) use ($mediaType) {
                    $mediaType = $movie['media_type'];
                    return collect($movie)->put('logo', $this->logo($mediaType, $movie['id']));
                });
            }
            $statistics['status'] = 'success';
            $statistics['quantity'] = count($media);
            $statistics['duration'] =  (time() - $time);

            Repository::create($statistics);
            return $media;
        } catch (\Throwable $th) {

            $statistics['status'] = 'failed';
            $statistics['error_message'] = $th->getMessage();
            $statistics['duration'] =  (time() - $time);
            Repository::create($statistics);
        }
    }
}
