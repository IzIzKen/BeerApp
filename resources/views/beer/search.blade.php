@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>検索結果</h1>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($beerFeelings as $beerFeeling)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $beerFeeling->beer->name }}</title>
                                <rect width="100%" height="100%" fill="#ffffff"/>
                                <image href="{{ $beerFeeling->beer->img_url }}" width="100%" height="100%"></image>
                            </svg>

                            <div class="card-body" style="border-top: solid #DDDDDD	thin">
                                <p>{{ $beerFeeling->beer->name }}</p>
                                <p>{{ $beerFeeling->beer->brewery->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('show', $beerFeeling->beer) }}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
