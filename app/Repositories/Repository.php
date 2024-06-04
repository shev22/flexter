<?php


namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Repository as RepositoryModel;
use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Http;


abstract class Repository
{
    public function tmdb($mediaRepo, $mediaType, $pages)
    {
        $time = time();
        $statistics = [
            'repository' => $mediaRepo . '-' . $mediaType,
            'quantity' => null,
            'duration' => null,
            'status' => null,
            'error_message' => null,
            'date' => Carbon::now()->format('d-m-y'),
        ];
        // try {

        // for ($i = 1; $i <= $pages; $i++) {
        //     $promises[] = Http::withToken(config('services.tmdb.token'))->async()->get('https://api.themoviedb.org/3/' . $mediaType . '/' .$mediaRepo.'?page=' . $i);
        // }
        //     $responses = Utils::unwrap($promises);

        //     $media = collect($responses)->map(function ($response) {
        //         if (array_key_exists("results", $response->json())) {
        //             return $response["results"];
        //         }
        //     })->collapse();

        //     $statistics['status'] = 'success';
        //     $statistics['quantity'] = count($media) . ' / ' . $pages * 20;
        //     $statistics['duration'] =  (time() - $time);

        //     RepositoryModel::create($statistics);
        //     return $media;
        // } catch (\Throwable $th) {
        //     $statistics['status'] = 'failed';
        //     $statistics['error_message'] = $th->getMessage();
        //     $statistics['duration'] =  (time() - $time);
        //     RepositoryModel::create($statistics);
        // }

        try {

            $client = new \GuzzleHttp\Client();

            for ($i = 1; $i <= $pages; $i++) {
                $promises[] = $client->requestAsync('GET', "https://api.themoviedb.org/3/$mediaType/$mediaRepo?page=$i", [
                    'headers' => [
                        'Authorization' => "Bearer " . config('services.tmdb.token'),
                        'accept' => 'application/json',
                    ],
                ]);
            }

            $responses = Utils::unwrap($promises);
            $media = collect($responses)->map(function ($response) {
                return json_decode($response->getBody(), true)['results'];
            })->collapse();
            $statistics['status'] = 'success';
            $statistics['quantity'] = count($media) . ' / ' . $pages * 20;
            $statistics['duration'] =  (time() - $time);

            RepositoryModel::create($statistics);
            return $media;
            return $media;
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            $statistics['status'] = 'failed';
            $statistics['error_message'] = $th->getMessage();
            $statistics['duration'] =  (time() - $time);
            RepositoryModel::create($statistics);
        }
    }
}
