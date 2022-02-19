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
                                            <select name="feeling_id" type="button" class="btn btn-warning dropdown-toggle btn-hero" data-bs-toggle="dropdown" aria-expanded="false">
                                                <option class="dropdown-header" value="{{ null }}">気分を選ぶ</option>
                                                @foreach($feelings as $feeling)
                                                    <option value="{{$feeling->id}}">{{$feeling->name}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    <div class="btn-group">
                                        <label for="temperature_id">
                                            <select name="temperature_id" type="button" class="btn btn-warning dropdown-toggle btn-hero" data-bs-toggle="dropdown" aria-expanded="false">
                                                <option class="dropdown-header" value="{{ null }}">気温を選ぶ</option>
                                                @foreach($temps as $temp)
                                                    <option value="{{$temp->id}}">{{$temp->temp}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    <div style="display: flex">
                                        <button class="btn-default btn-centered btn btn-hero animated flash infinite hero-start" style="margin-left: 0!important;" type="submit">ビールを探す</button>
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


    </main>

    <!-- Modal Content -->
    @component('layouts.modal_content', ['beerFeelings'=>$beerFeelings])
    @endcomponent

    <!-- /.enry-content -->



@endsection
<script>
    const options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function success(pos) {
        let crd = pos.coords;

        /*console.log(`Latitude : ${crd.latitude}`);//緯度
        console.log(`Longitude: ${crd.longitude}`);//経度
        console.log(`More or less ${crd.accuracy} meters.`);*///高度

        return crd;
    }

    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    navigator.geolocation.getCurrentPosition(success, error, options);

    const API_KEY = "997b02747a4686d1fb4dc1e20487ff1c"

    window.onload = function() {
        weather_search()
    };

    // 現在地の緯度経度を取得
    navigator.geolocation.getCurrentPosition(function (position) {
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;

    });
    const weather_search = function () {

        const url = 'https://api.openweathermap.org/data/2.5/forecast?lat=' + latitude + '&lon=' + longitude  + '&units=metric&appid=' + API_KEY;

        fetch(url).then((data) => {
            return data.json();
        }).then((json) => {
            console.log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
            console.log(json);
        }).catch(error => {
            console.error(error);
        });
    };

    function weatherJavaneseConversion(name) {
        switch (name) {
            case "Clear":
                return "晴れ"
            case 'Clouds':
                return "曇り"
            case "Rain":
                return "雨"
            case "Snow":
                return "雪"
            default:
                console.log(name)
                return name
        }
    }
</script>
