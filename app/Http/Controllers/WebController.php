<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Feeling;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WebController extends Controller
{
    public function index()
    {
        $feelings = Feeling::all();
        $today = Carbon::today();
        $beers = Beer::inRandomOrder($today->getTimestamp())->take(8)->get();

        return view('index', compact('feelings', 'beers'));
    }
}
