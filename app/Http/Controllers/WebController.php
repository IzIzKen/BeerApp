<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\beerFeeling;
use App\Models\Feeling;
use App\Models\Temperature;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use GuzzleHttp\Client;

class WebController extends Controller
{
    public function index()
    {
        $feelings = Feeling::all();
        $temps = Temperature::all();
        $today = Carbon::today();
        $queryParams = [
            'feeling_id' => null,
        ];

        $beerFeelings = beerFeeling::query()->search($queryParams)->inRandomOrder($today->getTimestamp())->take(8)->get();

        return view('index', compact('feelings', 'temps', 'beerFeelings'));
    }
}
