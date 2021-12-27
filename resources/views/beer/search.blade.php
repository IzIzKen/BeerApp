@extends('layouts.app')

@section('content')
    <div>
        <h1>検索結果</h1>
        <div>
            <table class="table">
                <thead>
                <th>名前</th>
                </thead>
                <tbody>
                @foreach($feeling->beerFeelings as $beerFeeling)
                    <tr>
                        <td>{{ $beerFeeling->beer->name }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
