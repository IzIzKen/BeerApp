@extends('layouts.app')

@section('content')

    <h2>一覧表示</h2>
    @foreach($beers as $beer)
        <div>
            <h5>名前：{{$beer->name}}</h5>
            <h6>￥{{$beer->price}}</h6>
        </div>
    @endforeach

    <a href="/">Top Page</a>

@endsection

