{{-- スタイル一覧ページ --}}
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
                        <h1 class="page-title"><span>スタイル一覧</span></h1>
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
                                <span itemprop="name">スタイル一覧</span>
                                <meta itemprop="position" content="2">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4" style="margin-bottom: 100px">
                        <div class="events-wrapper">
{{--                            <img alt="" src="img/beers_image_3×2.jpg"/>--}}
                            <h3 class="event-title">エール</h3>
                            <ul class="event-meta list-inline">
                                <li class="fa fa-industry tooltipster">上面発酵</li>
                                <li class="fa fa-beer tooltipster">ケルシュ, IPA, スタウトなど</li>
                            </ul>
                            <p>「上面発酵」のビールはエールと呼ばれ、豊かな味わいと香りを特徴とし、じっくり味わう飲み方に適しています。歴史的には下面発酵より古くからあります。</p>

                            <div class="col-md-6 col-sm-6 form-group">
                                <div class="form-group">
                                    {{--<label>エールのスタイル</label>
                                    <select class="form-control">
                                        @foreach($ales as $ale)
                                            <option class="event-btn btn btn-sm btn-default" href="javascript:void(0);" data-remodal-target="event-1">{{ $ale->name }}</option>
                                        @endforeach
                                    </select>--}}
                                    @foreach($ales as $ale)
                                        <a class="event-btn btn btn-sm btn-default" href="javascript:void(0);" data-remodal-target="event-{{ $ale->id }}">{{ $ale->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-bottom: 100px">
                        <div class="events-wrapper">
{{--                            <img alt="" src="img/beers_image_3×2.jpg"/>--}}
                            <h3 class="event-title">ラガー</h3>
                            <ul class="event-meta list-inline">
                                <li class="fa fa-industry tooltipster">下面発酵</li>
                                <li class="fa fa-beer tooltipster">ウィーン, ピルスナー, ボックなど</li>
                            </ul>
                            <p>「下面発酵」でつくられるビールは長期間熟成を行うため、貯蔵を意味するドイツ語からラガーと呼ばれます。一般的に爽快で飲みやすいのが特徴です。</p>

                            <div class="col-md-6 col-sm-6 form-group">
                                <div class="form-group">
                                    {{--<label>エールのスタイル</label>
                                    <select class="form-control">
                                        @foreach($ales as $ale)
                                            <option class="event-btn btn btn-sm btn-default" href="javascript:void(0);" data-remodal-target="event-1">{{ $ale->name }}</option>
                                        @endforeach
                                    </select>--}}
                                    @foreach($lagers as $lager)
                                        <a class="event-btn btn btn-sm btn-default" href="javascript:void(0);" data-remodal-target="event-{{ $lager->id }}">{{ $lager->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="events-wrapper">
{{--                            <img alt="" src="img/beers_image_3×2.jpg"/>--}}
                            <h3 class="event-title">自然発酵ビール, その他</h3>
                            <ul class="event-meta list-inline">
                                <li class="fa fa-industry tooltipster">自然発酵 など</li>
                                <li class="fa fa-beer tooltipster">ランビック, 木樽熟成ビール, チョコレートビールなど</li>
                            </ul>
                            <p>「自然発酵」は主にベルギーで採用されており、醸造所ごとに香味が異なり、フルーツなどを加えるタイプもあります。<br>低温で発酵する下面発酵酵母を常温で発酵させたもの（ハイブリッド）や、上面発酵酵母と下面発酵酵母を併用するもの（ミックス）、ハーブやフルーツなどの特別な原料をブレンドしたもの（ハーブ・スパイスビール、フルーツビール、その他）など特殊な製法のビールもあります。</p>

                            <div class="col-md-6 col-sm-6 form-group">
                                <div class="form-group">
                                    {{--<label>エールのスタイル</label>
                                    <select class="form-control">
                                        @foreach($ales as $ale)
                                            <option class="event-btn btn btn-sm btn-default" href="javascript:void(0);" data-remodal-target="event-1">{{ $ale->name }}</option>
                                        @endforeach
                                    </select>--}}
                                    @foreach($others as $other)
                                        <a class="event-btn btn btn-sm btn-default" href="javascript:void(0);" data-remodal-target="event-{{ $other->id }}">{{ $other->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal Content -->
    @component('layouts.style_modal_content', ['styles'=>$ales])
    @endcomponent
    @component('layouts.style_modal_content', ['styles'=>$lagers])
    @endcomponent
    @component('layouts.style_modal_content', ['styles'=>$others])
    @endcomponent

@endsection

