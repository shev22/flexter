<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TvModel;
use App\Models\Settings;
use App\Models\ActorModel;
use App\Models\MovieModel;
use App\Models\Repository;
use App\Models\TopRated;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {

        $users = User::all()->count();
        $movies = MovieModel::all()->count();
        $series = TvModel::all()->count();
        $actors = ActorModel::all()->count();
        $toprated = TopRated::all()->count();


        return view('admin.index', [
            'actors' => $actors,
            'movies' => $movies,
            'series' => $series,
            'users' => $users,
            'toprated' => $toprated
        ]);
    }

    public function settings(Request $request)
    {
        $query =  Settings::all();
        $repositories = $query->where('config_block_id', 1)->first();
        $homeSettings = $query->where('config_block_id', 2)->first();
        if ($request->input() != []) {

            $data = json_decode($repositories->config_data);
            foreach ($data  as $key => $value) {
                $value->pages  = $request->input($value->repository);
            }
            $repositories->config_data = json_encode($data);
            ($repositories->save());
        }
        return view('admin.settings', ['repositories' => $repositories, 'homeSettings' => $homeSettings]);
    }

    public function homeSettings(Request $request)
    {


        $repositories =  Settings::where('config_block_id', 2)->first();

        $data = json_decode($repositories->config_data);
        foreach ($data  as $key => $value) {
            $value->pages  = $request->input($value->repository);
        }
        $repositories->config_data = json_encode($data);

        ($repositories->save());
        return redirect()->back();
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

        $stats = Repository::where('date', $latest_update)->paginate(8);
        return view('admin.statistics', [
            'stats' => $stats,
            'updates' => $updates,
        ]);
    }


    public function users(Request $request)
    {

        if ($request->has('id')) {
            $user = User::findOrFail($request->input('id'));
            if ($user->role == 'admin') {
                $user->role = 'user';
                $user->update();
            } else {
                $user->role = 'admin';
                $user->update();
            }
            return redirect()->back();
        }

        $users = User::paginate(5);
        return view('admin.users', ['users' => $users]);
    }
}
