{{-- ビール詳細ページ --}}
@extends('layouts.app')

@section('content')
    <div class="header-wrap" style="background-image: url({{ asset('img/67662-OD5JA0-177_resize.jpg') }});">

        <!-- Navigation -->
    @component('layouts.navigation')
    @endcomponent

    <!-- Page Header -->
        <header class="header page-header image-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title"><span>{{$beer->name}}</span></h1>
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
                        <ol class="list-inline list-unstyled" itemscope itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="{{'home'}}"><span itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1"/>
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="{{'index'}}"><span itemprop="name">Beers</span></a>
                                <meta itemprop="position" content="2"/>
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <span itemprop="name">Detail</span>
                                <meta itemprop="position" content="3"/>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-slider">
                            <a class="about-single-gallery" href="img/placeholders/1400x1400.png"><img alt="" src="http://placehold.it/1400x933/555"></a>
                            <a class="about-single-gallery" href="img/placeholders/1400x1400.png"><img alt="" src="http://placehold.it/1400x933/444"></a>
                            <a class="about-single-gallery" href="img/placeholders/1400x1400.png"><img alt="" src="http://placehold.it/1400x933/333"></a>
                            <a class="about-single-gallery" href="img/placeholders/1400x1400.png"><img alt="" src="http://placehold.it/1400x933/222"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p>ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
            </div>
        </section>

        {{--<!-- Our Locations -->
        <section class="page-section no-padding">
            <div class="container-fluid">
                <div class="row no-gutter">
                    <div class="col-md-12">
                        <div id="gmap"></div>
                    </div>
                </div>
            </div>
        </section>--}}
    </main>
    <!-- /.enry-content -->

    {{--<h2>詳細ページ</h2>
    <div>
        <img src="{{ asset($beer->img_url) }}" alt="{{$beer->name}}" class="img-thumbnail">
    </div>

    <div>
        <h5>名前：{{$beer->name}}</h5>
        <p>￥{{$beer->price}}</p>
        <p>苦味：{{$beer->bitterness}}</p>
        <p>甘味：{{$beer->sweetness}}</p>
        <p>酸味：{{$beer->acidity}}</p>
        <p>コク：{{$beer->deepness}}</p>
        <p>キレ：{{$beer->strength}}</p>
        <p>ブルワリー：{{$beer->brewery->name}}</p>
        <p>URL：<a href="{{$beer->brewery->url}}">{{$beer->brewery->url}}</a></p>
    </div>

    <a href="/">Top Page</a>--}}

@endsection

