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

//        天気の情報を取得
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        $city = 'Tokyo';

        $url = "$base_url?units=metric&q=$city&APPID=$API_KEY";

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);

//        dd($weather_data['list'][0]['main']['temp']);
//        dd($weather_data);
//        return response()->json($weather_data);


        return view('index', compact('feelings', 'temps', 'beerFeelings'));
    }
}
