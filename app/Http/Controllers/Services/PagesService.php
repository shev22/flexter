<?php

namespace App\Http\Controllers\Services;

use App\Models\Settings;
use Illuminate\Support\Facades\Auth;

class PagesService
{

    public function checkActiveBackground()
    {

        if (Auth::check()) {
            $settings = Settings::where('user_id', Auth::id())->where('config_block_id', 1)->first();
            return  json_decode($settings->config_data)->nightmode;
        }
    }
}
