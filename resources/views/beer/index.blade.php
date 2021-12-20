@extends('layouts.app')

@section('content')

    <h2>一覧表示</h2>
    @foreach($beers as $beer)
        <div>
            <a href="{{ route('show', $beer) }}">
                <img src="{{ asset('img/dummy.png') }}">
            </a>
            <h5>名前：{{$beer->name}}</h5>
        </div>
    @endforeach

    <a href="/">Top Page</a>

@endsection

