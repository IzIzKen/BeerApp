<?php

namespace App\Http\Controllers;

use App\Models\beerFeeling;
use App\Models\Beer;
use App\Models\Feeling;
use App\Models\Temperature;
use App\Models\Brewery;
use App\Models\Style;
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
        $beers = Beer::query()->oldest('id')->paginate(
            $options['perPage'],
            $options['columns'],
            $options['pageName'],
            $options['page'],
        );

        //キーワード検索時
        $keyword = $request->input('keyword');
        $query = Beer::query();
        if(!empty($keyword))
        {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name','like','%'.$value.'%');
                $query->orWhere('name_en','like','%'.$value.'%');
                $query->orWhere('description','like','%'.$value.'%');
            }

            $beers = $query->orderBy('id','asc')->paginate(
                $options['perPage'],
                $options['columns'],
                $options['pageName'],
                $options['page'],
            );
        }

        return view('beer.index', compact('beers', 'keyword'));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function brewery(Request $request)
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
        $breweries = Brewery::query()->oldest('id')->paginate(
            $options['perPage'],
            $options['columns'],
            $options['pageName'],
            $options['page'],
        );

        //キーワード検索時
        $keyword = $request->input('keyword');
        $query = Brewery::query();
        if(!empty($keyword))
        {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name','like','%'.$value.'%');
                $query->orWhere('address','like','%'.$value.'%');
                $query->orWhere('description','like','%'.$value.'%');
            }

            $breweries = $query->orderBy('id','asc')->paginate(
                $options['perPage'],
                $options['columns'],
                $options['pageName'],
                $options['page'],
            );
        }

        return view('beer.brewery', compact('breweries', 'keyword'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function style()
    {
//        $query = Style::query();

        $ales = Style::query()->where('name','like','%(エール)%')->get();
        $lagers = Style::query()->where('name','like','%(ラガー)%')->get();
        $others = Style::query()->where('name','like','%(ハイブリッド)%')->get();

        /*$ales = Style::with('beers')->where('name', 'like', '%(エール)%')->get();
        $ale_beers = [];
        $index = 0;
        foreach ($ales as $ale){
            if (!$ale_beers[$index]->isNull()) {
                $ale_beers[$index] = $ale->beers->random();
            } else {
                $ale_beers[$index] = null;
            }
//            dd($ale_beers[$index]);
            $index += 1;
        }*/
        return view('beer.style', compact('ales', 'lagers', 'others'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Beer $beers
     * @param int $
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
//        $beer = Beer::with('brewery')->find($id);
        $brewery = Brewery::all()->find($id);
        $beers = Beer::query()->where('brewery_id', $id)->get();

        return view('beer.show', compact('beers', 'brewery'));
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
//        dd($request->temperature);
        $temp_string = $request->temperature;
        $temp = (int)$temp_string;
        $feeling_id_string = $request->feeling_id;
        $feeling_id = (int)$feeling_id_string;

        //気温と気分が両方とも選択された場合
        switch ($feeling_id) {
            case $temp <= 0:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => 5,
                    'strength' => 1,
                ];
                break;

            case 0 < $temp and $temp <= 10:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => 4,
                    'strength' => 2,
                ];
                break;

            case 10 < $temp and $temp <= 20:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => 3,
                    'strength' => 3,
                ];
                break;

            case 20 < $temp and $temp <= 30:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => 2,
                    'strength' => 4,
                ];
                break;

            case 30 < $temp:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => 1,
                    'strength' => 5,
                ];
                break;

            case $temp === null:
                $queryParams = [
                    'feeling_id' => $feeling_id,
                    'deepness' => 0,
                    'strength' => 0,
                ];
                break;
        }

//        dd($queryParams);
        $beerFeelings = beerFeeling::query()->search($queryParams)->get();
        $feeling = Feeling::all()->find($feeling_id);

        return view('beer.search', compact('beerFeelings', 'feeling'));
    }
}
