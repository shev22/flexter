<?php

namespace App\Http\Controllers;

use App\Models\ActorModel;
use App\Models\User;
use App\Models\TvModel;
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

    public function settings()
    {
        return view('admin.settings');
    }

    public function statistics(Request $request)
    {

        $dates =   $stats = Repository::get('date');
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
