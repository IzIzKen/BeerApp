{{-- ビール詳細ページ --}}
@extends('layouts.app')

@section('content')
    <div class="header-wrap" style="background-image: url({{ asset('img/67662-OD5JA0-177_resize.jpg') }});">

        <!-- Navigation -->
        @component('layouts.navigation')
        @endcomponent


        <main class="entry-content">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title"><span>{{$beer->name}}</span></h1>
                </div>
            </div>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="about-slider">
                                <a class="about-single-gallery" href={{ asset("$beer->img_url") }}><img alt="" src={{ asset("$beer->img_url") }}></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="events-wrapper">
                                <h3 class="event-title">{{ $beer->name }}</h3>
                                <h3 class="event-title">{{ $beer->name_en }}</h3>
                                <ul class="event-meta list-inline">
                                    <li class="fa fa-tint tooltipster">{{ $beer->alcohol }}</li>
                                    <li class="fa fa-beer tooltipster">{{ $beer->style->name }}</li>
                                    <li class="fa fa-industry tooltipster">{{ $beer->brewery->name }}</li>
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
    </div>

@endsection

