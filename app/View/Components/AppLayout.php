<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {


        switch (Route::currentRouteName()) {
            case '/':
                $title = 'Home';
                break;
            case 'actors.index':
                $title = 'Actors';
                break;
            case 'tv':
                $title = 'Series';
                break;
            case 'movies':
                $title = 'Movies';
                break;
            case 'search':
                $title = 'Search movies';
                break;
            case '404':
                $title = '404';
                break;
            case 'feedback':
                $title = 'Feedback';
                break;
            case 'wishlist':
                $title = 'Watchlist';
                break;
            case 'profile.edit':
                $title = 'Profile';
                break;
            case 'toprated':
                $title = 'Toprated';
                break;

            case 'actors.show':
                $title =  $this->formatURL();
                break;
            case 'movie.show':
                $title =  $this->formatURL();
                break;
            case 'tv.show':
                $title =  $this->formatURL();
                break;
            default:
                $title = '404 Page not found';
        }


        return view('layouts.app', compact('title'));
    }

    private function formatURL()
    {
        return str_replace('-'," ",explode('/', str_replace("https://flexter.com/", "", Request::url()))[1]);
    }
}
