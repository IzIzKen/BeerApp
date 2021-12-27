@extends('layouts.app')

@section('content')
    <div>
        <a href="/">
            <img src="{{ asset('img/manybeers.png') }}">
        </a>
        <h2>アプリの説明（画像の上に重なる）</h2>
    </div>

    <form action="{{ route('search')}}" method="post" >
        @csrf
        <div>
            <label for="feeling_id">今の気分を選択してください</label>
            <select name="feeling_id">
                <option></option>
                @foreach($feelings as $feeling)
                    <option value="{{$feeling->id}}">{{$feeling->name}}</option>
                @endforeach
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

        <button type="submit">検索</button>
    </form>

    <div>
        <a href="{{route('index')}}">
            <h3>一覧表示</h3>
        </a>
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
