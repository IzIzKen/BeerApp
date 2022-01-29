{{-- トップページ --}}
@extends('layouts.app')

@section('content')
    <div class="hero-wrap" style="background-image: url({{ asset('img/manybeers_resize.png') }});">

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
                                <h1 class="title">今の自分、が飲みたいビールを</h1>
                                <p class="subtitle">「ちょっといいことがあって嬉しいな」<br>「嫌なことがあったからスカッとしたい！」<br>そんな今の気分を教えていただけませんか？<br><br>「 気分 」と「 気温 」から今のあなたにぴったりのビールをご紹介いたします。</p>
                                <div class="btn-wrap">
                                    <a class="btn btn-hero animated flash infinite hero-start" href="javascript:void(0);">ビールを探す</a>
                                    <a href="{{route('index')}}" class="btn btn-hero">ビール一覧を見る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{--<!-- Hero Start -->
        <a class="fa fa-chevron-down animated flash infinite hero-start " href="javascript:void(0);"></a>--}}    </div>

    <!-- Page Content -->
    <main class="entry-content">
        <section class="page-section home-section no-padding no-margin">
            <div class="feature-wrapper">
                <div class="container-fluid">
                    <div class="row no-gutter">
                        <form action="{{ route('search')}}" method="post">
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

                            <button class="btn-default btn-centered" type="submit">検索</button>
                        </form>
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
                @component('layouts.beers', ['beers'=>$beers])
                @endcomponent


                <div class="btn-centered">
                    <a href="{{route('index')}}" class="btn btn-default">View More</a>
                </div>
            </div>
        </section>


    </main>

    <!-- Modal Content -->
    @component('layouts.modal_content', ['beers'=>$beers])
    @endcomponent

    <!-- /.enry-content -->



@endsection
