<div class="remodal-bg">

    @foreach($beers as $beer)
        <div class="remodal modal-beers" data-remodal-id="bottle-{{$beer->id}}">
            <button data-remodal-action="close" class="remodal-close"></button>
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="item-modal-image" style="background-size: contain">
                        <a class="image-lightbox" href="{{$beer->img_url}}"><img alt="" src="{{url($beer->img_url)}}"/></a>
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
