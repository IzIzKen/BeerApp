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
                                                <option value="-5">~ 0℃</option>
                                                @for ($i = 1; $i < 30; $i+=10)
                                                    <option value="{{$i + 4}}">{{$i}} ~ {{$i + 9}}℃</option>
                                                @endfor
                                                <option value="35">31℃ ~</option>
                                                {{--@foreach($temps as $temp)
                                                    <option value="{{$temp->id}}">{{$temp->temp}}</option>
                                                @endforeach--}}
                                            </select>
                                        </label>
                                    </div>
                                    <div style="display: flex">
                                        <button class="btn-default btn-centered btn btn-hero animated flash infinite" style="margin-left: 0!important; border-radius:30px; animation-duration: 4s;" type="submit">ビールを探す</button>
                                        <a class="btn-default btn-centered btn btn-hero" style="margin-left: 0!important;" href="{{ route('index') }}">ビール一覧を見る</a>
                                    </div>
                                </form>
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
        <section class="page-section home-section no-padding no-margin">
            <div class="feature-wrapper">
                <div class="container-fluid">
                    <div class="row no-gutter">
                        {{--<div class="col-md-4">
                            <div class="features-grid">
                                <a href="jobs.html">
                                    <figure>
                                        <img alt="" src="http://placehold.it/1400x933/444"/>
                                        <figcaption>
                                            <h2>We're Hiring</h2>
                                            <p>View our latest job positions</p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="features-grid">
                                <a href="events.html">
                                    <figure>
                                        <img alt="" src="http://placehold.it/1400x933/555"/>
                                        <figcaption>
                                            <h2>Upcoming Events</h2>
                                            <p>See our latest events schedule</p>
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
                        </div>--}}
                    </div>
                </div>
            </div>
        </section>


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
                <h3 class="section-heading"><span>今週のおすすめ</span></h3>
                <div class="row">
                    <div id="forecast" class="clients-carousel">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="client-item weather{{ $i }}">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
        <button id="bt2">button</button>
    </main>

    <!-- Modal Content -->
    @component('layouts.modal_content', ['beerFeelings'=>$beerFeelings])
    @endcomponent

    <!-- /.enry-content -->



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

    //天気の取得
    const weather_search = function () {

        const url = 'https://api.openweathermap.org/data/2.5/forecast?lat=' + latitude + '&lon=' + longitude + '&units=metric&lang=ja&appid=' + API_KEY;

        fetch(url).then((data) => {
            return data.json();
        }).then((json) => {
            console.log(json);
            // 都市名、国名
            $('#place').text(json.city.name + ', ' + json.city.country);
            let i = 0;
            /*console.log('都市名：' + json.city.name);
            console.log('国名：' + json.city.country);*/
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

                /*if (index === 0 || hours === 12) {
                    console.log('日時：' + `${month}/${date} ${hours}:${min}`);
                    console.log('気温：' + temperature);
                    console.log('天気：' + description);
                    console.log('画像パス：' + iconPath);
                }*/

                //現在の天気
                if (index === 0) {
                    //現在の気温をプルダウンに
                    if (index === 0) {
                        const addCurrentTemp = `
                        <option value="${temperature}">現在位置の気温</option>
                    `;
                        $('#temp').after(addCurrentTemp);
                    }
                    /*if (index === 0) {
                        const currentWeather = `
                        <div class="icon"><img src="${iconPath}"></div>
                        <div class="info">
                            <p>
                                <span class="description">現在の天気：${description}</span>
                                <span class="temp">${temperature}</span>°C
                            </p>
                        </div>`;
                        // $('#weather').html(currentWeather);
                    } */
                }
                //明日から5日分の天気を表示
                if (hours === 12 && date !== today) {
                    //週間の天気
                    const weekWeather = `
                    <a href="javascript:void(0);"><img src="${iconPath}"></a>
                    <div class="info">
                        <div style="text-align: center">
                            <span>${month}/${date}：${description}</span>
                            <span>${temperature}</span>°C
                        </div>
                    </div>`;
                    $('.weather' + i).html(weekWeather);
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
                            id: i,
                            month: month,
                            date: date,
                            desc: description,
                            temp: temperature,
                        },

                    })
                        //通信が成功したとき
                        .then((res) => {
                            console.log(res);
                        })
                        //通信が失敗したとき
                        .fail((error) => {
                            console.log(error.statusText);
                        });
                    i += 1;
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
