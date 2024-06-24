<?php

namespace App\Http\Controllers\Services;

use App\Models\Settings;
use Illuminate\Support\Facades\Cache;
use App\Repositories\AiringTodayRepository;
use App\Http\Controllers\interface\MediaInterface;

class AiringTodayService implements MediaInterface
{

    public function __construct(private AiringTodayRepository $airingToday){}

    public function getResource()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data[7]->pages;
        Cache::put('tv-airingtoday', $this->airingToday->airingToday('tv',  $data));
    }
}