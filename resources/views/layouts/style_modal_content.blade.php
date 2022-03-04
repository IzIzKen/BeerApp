<div class="remodal-bg">

    @foreach($styles as $style)
        <div class="remodal modal-beers" data-remodal-id="event-{{ $style->id }}">
            <button data-remodal-action="close" class="remodal-close"></button>
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="item-modal-image" style="background-size: contain">
                        <a class="image-lightbox" href="img/beers_image_3×2.jpg"><img alt="" src="img/beers_image_3×2.jpg"/></a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="events-wrapper">
                        <h4 class="event-title">{{ $style->name }}</h4>
                        <ul class="event-meta list-inline">
{{--                            <li class="fa fa-tint tooltipster">エール（上面発酵）</li>--}}
{{--                            <li class="fa fa-industry tooltipster"><a href="{{ $beerFeeling->beer->brewery->web }}">{{ $beerFeeling->beer->brewery->name }}</a></li>--}}
                        </ul>
                        <p>{{ $style->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
