<div class="row isotope-wrapper isotope-beers-wrapper">
    <div class="isotope isotope-beers gutter">
        @foreach($beerFeelings as $beerFeeling)
            <div class="grid-item col-lg-3 col-md-3 col-sm-6 col-ms-6" style="width: 50%">
                <div class="grid-wrapper">
                    <a href="javascript:void(0);" data-remodal-target="bottle-{{$beerFeeling->beer_id}}">
                        {{--<figure style="background-image: url('{{$beerFeeling->img_url}}'); background-size: contain;">
                            <figcaption class="grid-content">
                                <h5 class="grid-title"><span>{{$beerFeeling->name}}</span></h5>
                            </figcaption>
                        </figure>--}}
                        <figure class="img-thumbnail image-centered" style="display: flex; align-items: center; justify-content: center">
                            <img style="margin: 0;" src="img/beers/{{ $beerFeeling->beer_name }}.jpg">
                            <figcaption class="grid-content">
                                <h5 class="grid-title"><span>{{$beerFeeling->beer_name}}</span></h5>
                            </figcaption>
                        </figure>
                    </a>
                    <h5>{{$beerFeeling->beer_name}}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
