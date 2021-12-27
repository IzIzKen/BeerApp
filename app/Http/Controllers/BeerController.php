<?php

namespace App\Http\Controllers;

use App\Models\beerFeeling;
use App\Models\Beer;
use App\Models\Feeling;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::all();

        return view('beer.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Beer $beers
     * @param int $
     * @return \Illuminate\Http\Response
     */
    public function show(Beer $beers, int $id)
    {
        $beer = Beer::with('brewery')->find($id);

        return view('beer.show', compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Beer $beers
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Beer $beers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beer $beers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Beer $beers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beers)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function search(Request $request)
    {
//        $feeling = Feeling::find($request->feeling_id);

//        $temp = $request->temp; //30
//        switch ($temp) {
//            case 30:
//                $queryParams = [
//                    'biterness' => '2',
//                    'stremgs' => '5',
//                ];
//        }

        $queryParams = [
            'feeling_id' => $request->feeling_id,
            'bitterness' => 3
        ];

        $beerFeelings = beerFeeling::query()->search($queryParams)->get();
        dd($beerFeelings);

        return view('beer.search', compact('beerFeelings'));
    }
}
