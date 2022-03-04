<div class="remodal-bg">

    @foreach($beerFeelings as $beerFeeling)
        <div class="remodal modal-beers" data-remodal-id="bottle-{{$beerFeeling->beer_id}}">
            <button data-remodal-action="close" class="remodal-close"></button>
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="item-modal-image" style="background-size: contain">
                        <a class="image-lightbox" href="{{$beerFeeling->img_url}}"><img alt="" src="img/beers/{{ $beerFeeling->name }}.jpg"/></a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="events-wrapper">
                        <h3 class="event-title">{{ $beerFeeling->name }}</h3>
                        <h3 class="event-title">{{ $beerFeeling->name_en }}</h3>
                        <ul class="event-meta list-inline">
                            <li class="fa fa-tint tooltipster">{{ $beerFeeling->alcohol }}</li>
                            <li class="fa fa-beer tooltipster"><a href="{{ route('style') }}">{{ $beerFeeling->beer->style->name }}</a></li>
                            <li class="fa fa-industry tooltipster"><a href="{{ $beerFeeling->beer->brewery->web }}">{{ $beerFeeling->beer->brewery->name }}</a></li>
                        </ul>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>■ 苦さ</td>
                                <td>{{ str_repeat('🍺', $beerFeeling->bitterness) }}</td>
                            </tr>
                            <tr>
                                <td>■ 甘さ</td>
                                <td>{{ str_repeat('🍺', $beerFeeling->sweetness) }}</td>
                            </tr>
                            <tr>
                                <td>■ 酸味</td>
                                <td>{{ str_repeat('🍺', $beerFeeling->acidity) }}</td>
                            </tr>
                            <tr>
                                <td>■ コク</td>
                                <td>{{ str_repeat('🍺', $beerFeeling->deepness) }}</td>
                            </tr>
                            <tr>
                                <td>■ キレ</td>
                                <td>{{ str_repeat('🍺', $beerFeeling->strength) }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <p>{{ $beerFeeling->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
