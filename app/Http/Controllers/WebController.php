<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Feeling;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $feelings = Feeling::all();
        $beers = Beer::inRandomOrder()->take(8)->get();

        return view('index', compact('feelings', 'beers'));
    }
}
