<?php

namespace App\Http\Controllers;

use App\Models\beerFeeling;
use App\Models\Beer;
use App\Models\Feeling;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = [
            'page' => $request->page
        ];
        $options = array_merge([
            'perPage' => 20,
            'columns' => "*",
            'pageName' => 'page',
            'page' => 1,
        ],$page);
        $beers = Beer::query()->oldest('id')->paginate(
            $options['perPage'],
            $options['columns'],
            $options['pageName'],
            $options['page'],
        );

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
public
function edit(Beer $beers)
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
public
function update(Request $request, Beer $beers)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param \App\Models\Beer $beers
 * @return \Illuminate\Http\Response
 */
public
function destroy(Beer $beers)
{
    //
}

/**
 * @param Request $request
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
 *
 */
public
function search(Request $request)
{
    $temp = $request->temperature;
    switch ($temp) {
        case $temp >= -5 && $temp < 3:
            $queryParams = [
                'feeling_id' => $request->feeling_id,
                'deepness' => '5',
                'strength' => '1',
            ];
            break;

        case $temp >= 3 && $temp < 11:
            $queryParams = [
                'feeling_id' => $request->feeling_id,
                'deepness' => '4',
                'strength' => '2',
            ];
            break;

        case $temp >= 11 && $temp < 19:
            $queryParams = [
                'feeling_id' => $request->feeling_id,
                'deepness' => '3',
                'strength' => '3',
            ];
            break;

        case $temp >= 19 && $temp < 27:
            $queryParams = [
                'feeling_id' => $request->feeling_id,
                'deepness' => '2',
                'strength' => '4',
            ];
            break;

        case $temp >= 27 && $temp < 35:
            $queryParams = [
                'feeling_id' => $request->feeling_id,
                'deepness' => '1',
                'strength' => '5',
            ];
            break;
    }

//        dd($queryParams);
    $beerFeelings = beerFeeling::query()->search($queryParams)->get();

    return view('beer.search', compact('beerFeelings'));
}
}
