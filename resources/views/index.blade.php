{{-- トップページ --}}
@extends('layouts.app')

@section('content')
    <div class="hero-wrap" style="background-image: url({{ asset('img/manybeers3.png') }});">

        <!-- Navigation -->
    @component('layouts.navigation')
    @endcomponent


    <!-- Hero Header -->
        <header class="header header-hero">
            <div class="content">
                <div class="container">
                    <div class="row">

                        <div class="col-md-push-5 col-md-7 col-sm-12 col-xs-12">
                            <div class="header-content">
                                <h1 class="title">今の自分、<br>が飲みたいビールを</h1>
                                <p class="subtitle">今はどんな気分ですか？<br><br>「 気分 」と「 気温 」から<br>今のあなたにぴったりのビールを<br>ご紹介いたします</p>
                                <form action="{{ route('search')}}" method="post">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="fa fa-exclamation tooltipster"> {{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="btn-group">
                                        <label for="feeling_id">
                                            <select name="feeling_id" type="button" class="btn btn-warning dropdown-toggle btn-hero" data-bs-toggle="dropdown" aria-expanded="false" style="width: 180px; border-radius:30px;">
                                                <option class="dropdown-header" value="{{ null }}">気分を選ぶ</option>
                                                @foreach($feelings as $feeling)
                                                    <option value="{{$feeling->id}}">{{$feeling->name}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    <div class="btn-group">
                                        <label for="temperature_id">
                                            <select name="temperature" type="button" class="btn btn-warning dropdown-toggle btn-hero" data-bs-toggle="dropdown" aria-expanded="false" style="width: 180px; border-radius:30px;">
                                                <option id="temp" class="dropdown-header" value="{{ null }}">気温を選ぶ</option>
                                                <option value="-10">~ -5 ℃</option>
                                                @for ($i = -4; $i < 35; $i++)
                                                    <option value="{{$i}}">{{$i}} ℃</option>
                                                @endfor
                                                <option value="40">35 ℃ ~</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div style="display: flex">
                                        <button class="btn-default btn-centered btn btn-hero animated flash infinite" style="margin-left: 0!important; border-radius:30px; animation-duration: 4s;" type="submit">ビールを探す</button>
                                    </div>
                                </form>
{{--                                <button id="btn-location" class="btn-default btn-centered btn btn-hero" style="margin-left: 0!important;">位置情報を使用</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{--<!-- Hero Start -->
        <a class="fa fa-chevron-down animated flash infinite hero-start " href="javascript:void(0);"></a>--}}
    </div>

    <!-- Page Content -->
    <main class="entry-content">
        <!-- Our Beers -->
        <section class="page-section home-section">
            <div class="container" data-aos="fade-up" data-aos-offset="200">
                <h3 class="section-heading"><span>本日のおすすめ</span></h3>
                @component('layouts.beers', ['beerFeelings'=>$beerFeelings])
                @endcomponent


                <div class="btn-centered">
                    <a href="{{route('index')}}" class="btn btn-default">View More</a>
                </div>
            </div>
        </section>

        <!-- Technologies / Clients -->
        <section class="page-section home-section">
            <div class="container" data-aos="fade-up" data-aos-offset="200">
                <h3 class="section-heading area"><span>今週のおすすめ</span></h3>
                <div class="row">
                    <div id="forecast" class="clients-carousel">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="client-item weather{{ $i }}" style="padding-bottom: 50px">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section home-section no-padding no-margin">
            <div class="feature-wrapper">
                <div class="container-fluid">
                    <div class="row no-gutter">
                        <div class="col-md-4">
                            <div class="features-grid">
                                <a href="{{ route('index') }}">
                                    <figure>
                                        <img alt="" src="img/manybeers2_3×2.png"/>
                                        <figcaption>
                                            <h2>ビール一覧</h2>
                                            <p>400種類以上のビールをご紹介</p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="features-grid">
                                <a href="{{ route('brewery') }}">
                                    <figure>
                                        <img alt="" src="img/brewery2.jpg"/>
                                        <figcaption>
                                            <h2>ブルワリー一覧</h2>
                                            <p>ブルワリーとはビールの醸造所です<br>世界中のブルワリーをご紹介</p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="features-grid">
                                <a href="contact.html">
                                    <figure>
                                        <img alt="" src="http://placehold.it/1400x933/666"/>
                                        <figcaption>
                                            <h2>Get in Touch</h2>
                                            <p>Let us know your opinion</p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal Content -->
    @component('layouts.modal_content', ['beerFeelings'=>$beerFeelings])
    @endcomponent

@endsection
<script>
    const API_KEY = "997b02747a4686d1fb4dc1e20487ff1c"
    const options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function success(pos) {
        // 現在地の緯度経度を取得
        latitude = pos.coords.latitude;
        longitude = pos.coords.longitude;
        window.onload = function () {
            weather_search()
        };
    }

    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    //現在地の取得：成功→success or 失敗→error
    navigator.geolocation.getCurrentPosition(success, error, options);

    window.addEventListener('DOMContentLoaded', function(){
        /** jQueryの処理 */
        $('#btn-location').on('click', function () {
            console.log('/////////////////////////////////////////////');
        });
    });

    //天気の取得
    const weather_search = function () {

        const urlCurrent = 'https://api.openweathermap.org/data/2.5/weather?lat=' + latitude + '&lon=' + longitude + '&units=metric&lang=ja&appid=' + API_KEY;
        const url = 'https://api.openweathermap.org/data/2.5/forecast?lat=' + latitude + '&lon=' + longitude + '&units=metric&lang=ja&appid=' + API_KEY;

        //現在の天気
        fetch(urlCurrent).then((data) => {
            return data.json();
        }).then((json) => {
            console.log(json);
            const dateTime = new Date(utcToJSTime(json.dt));
            const month = dateTime.getMonth() + 1;
            const date = dateTime.getDate();
            const hours = dateTime.getHours();
            const min = String(dateTime.getMinutes()).padStart(2, '0');
            const temperature = Math.round(json.main.temp);
            const description = json.weather[0].description;
            const iconPath = `img/weather/${json.weather.icon}.svg`;

            console.log('日時：' + `${month}/${date} ${hours}:${min}`);
            console.log('気温：' + temperature);
            console.log('天気：' + description);

            const addCurrentTemp = `
                        <option value="${temperature}">現在位置の気温</option>
                    `;
            $('#temp').after(addCurrentTemp);
            /** jQueryの処理 */
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                //POST通信
                type: "post",
                //ここでデータの送信先URLを指定します。
                url: "/",
                dataType: "json",
                data: {
                    month: month,
                    date: date,
                    desc: description,
                    temp: temperature,
                },
            })
                //通信が成功したとき
                .then((res) => {
                    //取得jsonデータ
                    const data_stringify = JSON.stringify(res);
                    const data_json = JSON.parse(data_stringify);
                    console.log(data_json);
                    console.log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
                    //jsonデータから各データを取得
                    const img = `img/beers/${data_json[0]["name"]}.jpg`;
                    const name = data_json[0]["name"];
                })
                //通信が失敗したとき
                .fail((error) => {
                    console.log(error.statusText);
                });
        });

        //明日からの天気
        fetch(url).then((data) => {
            return data.json();
        }).then((json) => {
            console.log(json);
            const city = json.city.name;
            let i = 0;
            // 天気予報データ
            json.list.forEach(function (forecast, index) {
                const dateTime = new Date(utcToJSTime(forecast.dt));
                const month = dateTime.getMonth() + 1;
                const date = dateTime.getDate();
                const hours = dateTime.getHours();
                const min = String(dateTime.getMinutes()).padStart(2, '0');
                const temperature = Math.round(forecast.main.temp);
                const description = forecast.weather[0].description;
                const iconPath = `img/weather/${forecast.weather[0].icon}.svg`;

                const now = new Date();
                const today = now.getDate();
                /*console.log('日時：' + `${month}/${date} ${hours}:${min}`);
                console.log('気温：' + temperature);
                console.log('天気：' + description);*/

                //明日から5日分の天気を表示
                if (hours === 12) {
                    const area = `
                        <span>今週のおすすめ</span>
                        <p></p><h3>${city}</h3>`;
                    $('.area').html(area);
                    /** jQueryの処理 */
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                    });
                    $.ajax({
                        //POST通信
                        type: "post",
                        //ここでデータの送信先URLを指定します。
                        url: "/",
                        dataType: "json",
                        data: {
                            month: month,
                            date: date,
                            desc: description,
                            temp: temperature,
                        },
                    })
                        //通信が成功したとき
                        .then((res) => {
                            //取得jsonデータ
                            const data_stringify = JSON.stringify(res);
                            const data_json = JSON.parse(data_stringify);
                            //jsonデータから各データを取得
                            const img = `img/beers/${data_json[0]["name"]}.jpg`;
                            const name = data_json[0]["name"];
                            const weekBeer = `
                            <div style="text-align: center">
                                <span>${month}/${date}:${description} ${temperature}°C</span>
                                <img style="width: 25%; height: auto; margin: 0 auto; background-repeat: no-repeat" src="${iconPath}">
                            </div>
                            <a href="javascript:void(0);"><img style="width: auto; height: 150px" src="${img}"></a>
                            <div class="info">
                                <div style="text-align: center">
                                    <span>${name}<br></sp
                                </div>
                            </div>`;
                            $('.weather' + i).html(weekBeer);
                            console.log(res);
                            i += 1;
                        })
                        //通信が失敗したとき
                        .fail((error) => {
                            console.log(error.statusText);
                        });
                }
            });
        }).catch(error => {
            console.error(error);
        });
    };

    function utcToJSTime(UTCTime) {
        return UTCTime * 1000;
    }
</script>
