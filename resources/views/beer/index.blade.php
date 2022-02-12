{{-- ビール一覧ページ --}}
@extends('layouts.app')

@section('content')
    <div class="header-wrap" style="background-image: url({{ asset('img/manybeers2_resize.png') }});">

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
                                <a itemprop="item" href="{{route('home')}}"><span itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <span itemprop="name">Beers</span>
                                <meta itemprop="position" content="2">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="page-section">
            <div class="container">
            @component('layouts.beers', ['beers'=>$beers])
            @endcomponent




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
    @component('layouts.modal_content', ['beers'=>$beers])
    @endcomponent
    {{--

        <h2>一覧表示</h2>
        @foreach($beers as $beer)
            <div>
                <a href="{{ route('show', $beer) }}" class="img-thumbnail">
                    <img src="{{ asset('img/dummy.png') }}">
                </a>
                <h5>名前：{{$beer->name}}</h5>
            </div>
        @endforeach

        <a href="/">Top Page</a>
    --}}

@endsection

