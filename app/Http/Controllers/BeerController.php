<?php

namespace App\Http\Controllers;

use App\Models\Beers;
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
        $beers = Beers::all();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Beers $beers
     * @param int $
     * @return \Illuminate\Http\Response
     */
    public function show(Beers $beers, int $id)
    {
        $beer = Beers::with('brewery')->find($id);

        return view('beer.show', compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beers  $beers
     * @return \Illuminate\Http\Response
     */
    public function edit(Beers $beers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beers  $beers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beers $beers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beers  $beers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beers $beers)
    {
        //
    }
}
