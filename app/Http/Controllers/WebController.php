<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\beerFeeling;
use App\Models\Feeling;
use App\Models\Temperature;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

    public function forecast(Request $request)
    {
        $result = $request->all();

        $tempForecast = Arr::only($result, ['temp']);
        $temp = (int)$tempForecast['temp'];

        $day = Arr::only($result, ['date']);
        $day_int = (int)$day['date'];

        $today = Carbon::today();
        $today_date = $today->day;

        switch ($temp) {
            case $temp <= 0:
                $queryParams = [
                    'feeling_id' => null,
                    'deepness' => 5,
                    'strength' => 1,
                ];
                break;

            case $temp > 0 && $temp <= 10:
                $queryParams = [
                    'feeling_id' => null,
                    'deepness' => 4,
                    'strength' => 2,
                ];
                break;

            case $temp > 10 && $temp <= 20:
                $queryParams = [
                    'feeling_id' => null,
                    'deepness' => 3,
                    'strength' => 3,
                ];
                break;

            case $temp > 20 && $temp <= 30:
                $queryParams = [
                    'feeling_id' => null,
                    'deepness' => 2,
                    'strength' => 4,
                ];
                break;

            case $temp > 30:
                $queryParams = [
                    'feeling_id' => null,
                    'deepness' => 1,
                    'strength' => 5,
                ];
                break;
        }
        if ($today_date == $day_int){
            $beerForecast = beerFeeling::query()->search($queryParams)->inRandomOrder($today->getTimestamp())->take(4)->get();
        }
        else{
            $beerForecast = beerFeeling::query()->search($queryParams)->inRandomOrder(/*$today->getTimestamp()*/)->take(1)->get();
        }

        return $beerForecast;
    }

    public function test(Request $request)
    {
        $queryParams = [
            'feeling_id' => null,
            'deepness' => 1,
            'strength' => 5,
        ];
        if (false){
            $beerForecast = beerFeeling::query()->search($queryParams)->inRandomOrder($today->getTimestamp())->take(4)->get();
        }
        else{
            $beerForecast = beerFeeling::query()->search($queryParams)->inRandomOrder(/*$today->getTimestamp()*/)->take(1)->get();
            dd($beerForecast);
        }

        return $beerForecast;
    }
}
