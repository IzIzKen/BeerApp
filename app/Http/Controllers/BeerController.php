<?php

namespace App\Http\Controllers;

use App\Models\beerFeeling;
use App\Models\Beer;
use App\Models\Feeling;
use App\Models\Temperature;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Http\Requests\BeersSearchRequest;

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
        ], $page);
        /*$beers = Beer::query()->oldest('id')->paginate(
            $options['perPage'],
            $options['columns'],
            $options['pageName'],
            $options['page'],
        );*/
        $queryParams = [
            'feeling_id' => null,
        ];
        $beerFeelings = beerFeeling::query()->search($queryParams)->oldest('beer_id')->paginate(
            $options['perPage'],
            $options['columns'],
            $options['pageName'],
            $options['page'],
        );

        return view('beer.index', compact('beerFeelings'));
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
    function search(BeersSearchRequest $request)
    {
//        dd($request);
        $temp_id = $request->temperature_id;
        $feeling_id = $request->feeling_id;

        //気温と気分が両方とも選択されない場合
        if (is_null($temp_id) and is_null($feeling_id)){
            return $this->index($request);
        }

        //気温と気分が両方とも選択された場合
        switch ($feeling_id) {
            case $temp_id == 1:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => '5',
                    'strength' => '1',
                ];
                break;

            case $temp_id == 2:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => '4',
                    'strength' => '2',
                ];
                break;

            case $temp_id == 3:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => '3',
                    'strength' => '3',
                ];
                break;

            case $temp_id == 4:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => '2',
                    'strength' => '4',
                ];
                break;

            case $temp_id == 5:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => '1',
                    'strength' => '5',
                ];
                break;

            case $temp_id === null:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => '0',
                    'strength' => '0',
                ];
                break;
        }

//        dd($queryParams);
        $beerFeelings = beerFeeling::query()->search($queryParams)->get();
        $feeling = Feeling::all()->find($feeling_id);
        $temp = Temperature::all()->find($temp_id);

        return view('beer.search', compact('beerFeelings', 'feeling', 'temp'));
    }
}
