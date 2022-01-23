{{-- 検索結果表示ページ --}}
@extends('layouts.app')

@section('content')
    <div class="header-wrap" style="background-image: url(img/67662-OD5JA0-177_resize.jpg);">

        <!-- Navigation -->
    @component('layouts.navigation')
    @endcomponent


    <!-- Page Header -->
        <header class="header page-header image-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title"><span>Your Beers</span></h1>
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
                                <a itemprop="item" href="{{route('index')}}"><span itemprop="name">Beers</span></a>
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
            @component('layouts.beers', ['beers'=>$beerFeelings])
            @endcomponent




            <!-- Load More -->
                <div class="load-more-wrapper">
                    <a href="javascript:void(0);"><i class="fa fa-refresh"></i> Load More</a>
                </div>
            </div>
        </section>

    </main>

    <!-- Modal Content -->
    @component('layouts.modal_content', ['beers'=>$beerFeelings])
    @endcomponent

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
