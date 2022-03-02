{{-- ビール一覧ページ --}}
@extends('layouts.app')

@section('content')
    <div class="header-wrap" style="background-image: url({{ asset('img/manybeers2_resize.png') }}); background-size: cover;">

        <!-- Navigation -->
    @component('layouts.navigation')
    @endcomponent


    <!-- Page Header -->
        <header class="header page-header image-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title"><span>ビール一覧</span></h1>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <main class="entry-content">

        <!-- Breadcrumbs -->
        <div class="page-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="list-inline list-unstyled" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="{{ route('home') }}"><span itemprop="name">ホーム</span></a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <span itemprop="name">ビール一覧</span>
                                <meta itemprop="position" content="2">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="page-section no-padding">
            <div class="container">
                <form method="get" action="" class="form-inline" style="margin-bottom: 20px">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" value="{{$keyword}}" placeholder="キーワードを入力" style="margin-top: 5px; display: inline-block;">
                        <a href="{{ route('index') }}" class="fa fa-remove tooltipster" style="display: inline-block; color: #cccccc; background-color:transparent; border: 1px solid #cccccc; border-radius:50%; width: 25px; height: 25px; line-height: 25px; text-align: center"></a>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="検索" class="btn" style="display: inline-block; color:white; background-color:#ffc930; border: 1px solid #ffc930; border-radius:30px; width: 100px">
                    </div>
                </form>
                {{--@component('layouts.beers', ['beerFeelings'=>$beerFeelings])
                @endcomponent--}}
                {{--<div class="row">
                    <div class="col-md-12">
                        <div class="isotope-filters" role="group">
                            <div class="btn-group">
                                <button type="button" class="btn our-beers-btn is-checked" data-filter="*">All</button>
                                <button type="button" class="btn our-beers-btn" data-filter=".bottles">Bottles</button>
                                <button type="button" class="btn our-beers-btn" data-filter=".taps">Taps</button>
                                <button type="button" class="btn our-beers-btn" data-filter=".speciality">Speciality</button>
                                <button type="button" class="btn our-beers-btn" data-filter=".other">Other</button>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <div class="row isotope-wrapper isotope-beers-wrapper">
                    <div class="isotope isotope-beers gutter">
                        @foreach($beers as $beer)
                            <div class="grid-item col-lg-3 col-md-3 col-sm-6 col-ms-6" style="width: 50%"{{--ここにdata-filterに当てはまるclassを記述--}}>
                                <div class="grid-wrapper">
                                    <a href="javascript:void(0);" data-remodal-target="bottle-{{$beer->id}}">
                                        <figure class="img-thumbnail image-centered" style="display: flex; align-items: center; justify-content: center">
                                            <img style="margin: 0;" src="img/beers/{{ $beer->name }}.jpg">
                                            <figcaption class="grid-content">
                                                <h5 class="grid-title"><span>{{$beer->name}}</span></h5>
                                            </figcaption>
                                        </figure>
                                    </a>
                                    <h5>{{$beer->name}}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <!-- Load More -->
                <div class="row">
                    <div class="col-sm-12">
                        <div>
                            {{ $beers->links('layouts.default') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Modal Content -->
    {{--@component('layouts.modal_content', ['beerFeelings'=>$beerFeelings])
    @endcomponent--}}
    <div class="remodal-bg">

        @foreach($beers as $beer)
            <div class="remodal modal-beers" data-remodal-id="bottle-{{$beer->id}}">
                <button data-remodal-action="close" class="remodal-close"></button>
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="item-modal-image" style="background-size: contain">
                            <a class="image-lightbox" href="{{$beer->img_url}}"><img alt="" src="{{ url($beer->img_url) }}"/></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="events-wrapper">
                            <h3 class="event-title">{{ $beer->name }}</h3>
                            <h3 class="event-title">{{ $beer->name_en }}</h3>
                            <ul class="event-meta list-inline">
                                <li class="fa fa-tint tooltipster">{{ $beer->alcohol }}</li>
                                <li class="fa fa-beer tooltipster">{{ $beer->style->name }}</li>
                                <li class="fa fa-industry tooltipster"><a href="{{ $beer->brewery->web }}">{{ $beer->brewery->name }}</a></li>
                            </ul>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>■ 苦さ</td>
                                    <td>{{ str_repeat('🍺', $beer->bitterness) }}</td>
                                </tr>
                                <tr>
                                    <td>■ 甘さ</td>
                                    <td>{{ str_repeat('🍺', $beer->sweetness) }}</td>
                                </tr>
                                <tr>
                                    <td>■ 酸味</td>
                                    <td>{{ str_repeat('🍺', $beer->acidity) }}</td>
                                </tr>
                                <tr>
                                    <td>■ コク</td>
                                    <td>{{ str_repeat('🍺', $beer->deepness) }}</td>
                                </tr>
                                <tr>
                                    <td>■ キレ</td>
                                    <td>{{ str_repeat('🍺', $beer->strength) }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p>{{ $beer->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection

