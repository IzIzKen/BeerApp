{{-- ブルワリーごとのビール一覧ページ --}}
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
                        <h1 class="page-title"><span>{{ $brewery->name }}のビール一覧</span></h1>
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
                                <a itemprop="item" href="{{ route('brewery') }}"><span itemprop="name">ブルワリー一覧</span></a>
                                <meta itemprop="position" content="2">
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <span itemprop="name">{{ $brewery->name }}のビール一覧</span>
                                <meta itemprop="position" content="3">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="page-section no-padding">
            <div class="container">
                <div class="row isotope-wrapper isotope-beers-wrapper">
                    <div class="isotope isotope-beers gutter">
                        @foreach($beers as $beer)
                            <div class="grid-item col-lg-3 col-md-3 col-sm-6 col-ms-6" style="width: 50%"{{--ここにdata-filterに当てはまるclassを記述--}}>
                                <div class="grid-wrapper">
                                    <a href="javascript:void(0);" data-remodal-target="bottle-{{$beer->id}}">
                                        <figure class="img-thumbnail image-centered" style="display: flex; align-items: center; justify-content: center">
                                            <img style="margin: 0;" src="{{ asset('img/beers/' . $beer->name . '.jpg') }}">
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
                {{--<div class="row">
                    <div class="col-sm-12">
                        <div>
                            {{ $beers->links('layouts.default') }}
                        </div>
                    </div>
                </div>--}}
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
                            <a class="image-lightbox" href="img/beers/{{ $beer->name }}.jpg"><img alt="" src="{{ asset('img/beers/' . $beer->name . '.jpg') }}"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="events-wrapper">
                            <h3 class="event-title">{{ $beer->name }}</h3>
                            <h3 class="event-title">{{ $beer->name_en }}</h3>
                            <ul class="event-meta list-inline">
                                <li class="fa fa-tint tooltipster">{{ $beer->alcohol }}</li>
                                <li class="fa fa-beer tooltipster"><a href="{{ route('style') }}">{{ $beer->style->name }}</a></li>
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

