<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        /*
            when you used eager loading with hasMany relationship you may have looping query code
            you musst used the single relation sucks hasOne in Model to get the single query
        */
        $bands = Band::with('album')->paginate(9);

        return view('home', [
            'bands' => $bands
        ]);
    }
}
