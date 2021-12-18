@extends('layouts.app')

@section('content')
    <div class="box">
        <a href="/">
            <img src="{{ asset('img/manybeers.png') }}">
        </a>
        <h2>画像の上に重なる説明　が入ります</h2>
    </div>

    <div>
        <label for="feelings">今の気分を選択してください</label>
        <select name="feelings">
            <option></option>
            <option value="1">test1</option>
            <option value="2">test2</option>
            <option value="3">test3</option>
        </select>
    </div>

    <div>
        <label for="temperature">今の気温を選択してください</label>
        <select name="temperature">
            <option></option>
            @for($i = -5; $i <= 40; $i++)
            <option value="{{ $i }}">{{$i}} ℃</option>
            @endfor
        </select>
    </div>

    <div>
        <a href="/">
            <img src="{{ asset('img/dummy.png') }}">
        </a>
        <h3>ビールの概要</h3>
        <a href="/">
            <img src="{{ asset('img/dummy.png') }}">
        </a>
        <h3>ビールの概要</h3>
        <a href="/">
            <img src="{{ asset('img/dummy.png') }}">
        </a>
        <h3>ビールの概要</h3>
    </div>

@endsection
