<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TvModel;
use App\Models\Settings;
use App\Models\ActorModel;
use App\Models\MovieModel;
use App\Models\Repository;
use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::all()->count();
        $movies = MovieModel::all()->count();
        $series = TvModel::all()->count();
        $actors = ActorModel::all()->count();


        return view('admin.index', [
            'actors' => $actors,
            'movies' => $movies,
            'series' => $series,
            'users' => $users
        ]);
    }

    public function settings(Request $request)
    {
        $repositories =  Settings::where('config_block_id', 1)->first();
        if ($request->input() != []) {

            $data = json_decode($repositories->config_data);

            $data[0]->pages = $request->input('Actors');
            $data[1]->pages = $request->input('tv_onair');
            $data[2]->pages = $request->input('tv_popular');
            $data[3]->pages = $request->input('tv_toprated');
            $data[4]->pages = $request->input('tv_trending');
            $data[5]->pages = $request->input('all_trending');
            $data[6]->pages = $request->input('movies_popular');
            $data[7]->pages = $request->input('tv_airingtoday');
            $data[8]->pages = $request->input('movies_toprated');
            $data[9]->pages = $request->input('movies_trending');
            $data[10]->pages = $request->input('movies_upcoming');
            $data[11]->pages = $request->input('movies_nowplaying');
            $repositories->config_data = json_encode($data);

            ($repositories->save());
        }
        return view('admin.settings', ['repositories' => $repositories]);
    }

    public function statistics(Request $request)
    {

        $dates =  Repository::get('date');
        $updates =  collect($dates)->unique();

        if ($request->has('date')) {
            $latest_update = $request->input('date');
        } else {
            $latest_update = $updates->last()?->date;
        }

        $stats = Repository::where('date', $latest_update)->get();
        return view('admin.statistics', [
            'stats' => $stats,
            'updates' => $updates,
        ]);
    }


    public function users()
    {
        return view('admin.users');
    }
}


