<div class="row">
    <div class="col-md-12">
        <div class="isotope-filters" role="group">
            <div class="btn-group">
                <button type="button" class="btn our-beers-btn is-checked" data-filter="*">All</button>
                <button type="button" class="btn our-beers-btn" data-filter=".bottles">Bottles</button>
                <button type="button" class="btn our-beers-btn" data-filter=".taps">Taps</button>
                <button type="button" class="btn our-beers-btn" data-filter=".speciality">Speciality</button>
                <button type="button" class="btn our-beers-btn" data-filter=".other">Other</button>
            </div>
        </div>
    </div>
</div>
<div class="row isotope-wrapper isotope-beers-wrapper">
    <div class="isotope isotope-beers gutter">
        @foreach($beerFeelings as $beerFeeling)
            <div class="grid-item col-lg-3 col-md-3 col-sm-6 col-ms-6 col-xs-12">
                <div class="grid-wrapper">
                    <a href="javascript:void(0);" data-remodal-target="bottle-{{$beerFeeling->beer_id}}">
                        <figure style="background-image: url('{{$beerFeeling->img_url}}'); background-size: contain">
                            <figcaption class="grid-content">
                                <h5 class="grid-title"><span>{{$beerFeeling->name}}</span></h5>
                            </figcaption>
                        </figure>
                    </a>
                    <h5>{{$beerFeeling->name}}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
