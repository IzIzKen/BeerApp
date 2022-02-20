{{-- 検索結果表示ページ --}}
@extends('layouts.app')

@section('content')
    <div class="header-wrap" style="background-image: url({{ asset('img/manybeers2_resize.png') }}); background-size: cover">

        <!-- Navigation -->
    @component('layouts.navigation')
    @endcomponent


    <!-- Page Header -->
        <header class="header page-header image-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-title"><span>{{ $feeling->name }}<br>気分なときは . . .</span></h3>
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
                                <a itemprop="item" href="{{route('home')}}"><span itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="{{ route('index') }}"><span itemprop="name">Beers</span></a>
                                <meta itemprop="position" content="2">
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <span itemprop="name">Result</span>
                                <meta itemprop="position" content="3">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="page-section">
            <div class="container">
                @component('layouts.beers', ['beerFeelings'=>$beerFeelings])
                @endcomponent
                {{--<div class="row isotope-wrapper isotope-beers-wrapper">
                    <div class="isotope isotope-beers gutter">
                        @foreach($beerFeelings as $beerFeeling)
                            <div class="grid-item col-lg-3 col-md-3 col-sm-6 col-ms-6 col-xs-12">
                                <div class="grid-wrapper">
                                    <a href="javascript:void(0);" data-remodal-target="bottle-{{$beerFeeling->id}}">
                                        <figure style="background-image: url('{{$beerFeeling->img_url}}'); background-size: contain">
                                            <figcaption class="grid-content">
                                                <h5 class="grid-title"><span>{{$beerFeeling->name}}</span></h5>
                                            </figcaption>
                                        </figure>
                                    </a>
                                    <h5>{{$beerFeeling->name}}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>--}}


                <!-- Load More -->
                {{--<div class="row">
                    <div class="col-sm-12">
                        <div>
                            {{ $beerFeelings->links('layouts.default') }}
                        </div>
                    </div>
                </div>--}}
            </div>
        </section>

    </main>

    <!-- Modal Content -->
    {{--@component('layouts.modal_content', ['beers'=>$beerFeelings])
    @endcomponent--}}
    <div class="remodal-bg">

        @foreach($beerFeelings as $beerFeeling)
            <div class="remodal modal-beers" data-remodal-id="bottle-{{$beerFeeling->beer->id}}">
                <button data-remodal-action="close" class="remodal-close"></button>
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="item-modal-image" style="background-size: contain">
                            <a class="image-lightbox" href="{{$beerFeeling->beer->img_url}}"><img alt="" src="{{ url($beerFeeling->beer->img_url) }}"/></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="events-wrapper">
                            <h3 class="event-title">{{ $beerFeeling->beer->name }}</h3>
                            <h3 class="event-title">{{ $beerFeeling->beer->name_en }}</h3>
                            <ul class="event-meta list-inline">
                                <li class="fa fa-tint tooltipster">{{ $beerFeeling->beer->alcohol }}</li>
                                <li class="fa fa-beer tooltipster">{{ $beerFeeling->beer->style->name }}</li>
                                <li class="fa fa-industry tooltipster"><a href="{{ $beerFeeling->beer->brewery->web }}">{{ $beerFeeling->beer->brewery->name }}</a></li>
                            </ul>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>■ 苦さ</td>
                                    <td>{{ str_repeat('🍺', $beerFeeling->beer->bitterness) }}</td>
                                </tr>
                                <tr>
                                    <td>■ 甘さ</td>
                                    <td>{{ str_repeat('🍺', $beerFeeling->beer->sweetness) }}</td>
                                </tr>
                                <tr>
                                    <td>■ 酸味</td>
                                    <td>{{ str_repeat('🍺', $beerFeeling->beer->acidity) }}</td>
                                </tr>
                                <tr>
                                    <td>■ コク</td>
                                    <td>{{ str_repeat('🍺', $beerFeeling->beer->deepness) }}</td>
                                </tr>
                                <tr>
                                    <td>■ キレ</td>
                                    <td>{{ str_repeat('🍺', $beerFeeling->beer->strength) }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p>{{ $beerFeeling->beer->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    {{--<div class="text-center">
        <h1>検索結果</h1>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($beerFeelings as $beerFeeling)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $beerFeeling->beer->name }}</title>
                                <rect width="100%" height="100%" fill="#ffffff"/>
                                <image href="{{ $beerFeeling->beer->img_url }}" width="100%" height="100%"></image>
                            </svg>

                            <div class="card-body" style="border-top: solid #DDDDDD	thin">
                                <p>{{ $beerFeeling->beer->name }}</p>
                                <p>{{ $beerFeeling->beer->brewery->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('show', $beerFeeling->beer) }}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>--}}
@endsection
