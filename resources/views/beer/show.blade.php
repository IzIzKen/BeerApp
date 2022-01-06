@extends('layouts.app')

@section('content')

    <h2>詳細ページ</h2>
    <div>
        <img src="{{ asset('$beer->img_url') }}" alt="{{$beer->name}}">
    </div>

    <div>
        <h5>名前：{{$beer->name}}</h5>
        <p>￥{{$beer->price}}</p>
        <p>苦味：{{$beer->bitterness}}</p>
        <p>甘味：{{$beer->sweetness}}</p>
        <p>酸味：{{$beer->acidity}}</p>
        <p>コク：{{$beer->deepness}}</p>
        <p>キレ：{{$beer->strength}}</p>
        <p>ブルワリー：{{$beer->brewery->name}}</p>
        <p>URL：<a href="{{$beer->brewery->url}}">{{$beer->brewery->url}}</a></p>
    </div>

    <a href="/">Top Page</a>

@endsection

