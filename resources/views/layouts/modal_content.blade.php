<div class="remodal-bg">

    @foreach($beers as $beer)
        <div class="remodal modal-beers" data-remodal-id="bottle-{{$beer->id}}">
            <button data-remodal-action="close" class="remodal-close"></button>
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="item-modal-image">
                        <a class="image-lightbox" href="{{$beer->img_url}}"><img alt="" src="{{url($beer->img_url)}}"/></a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <h3>{{$beer->name}}</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>ABV:</td>
                            <td>{{$beer->bitterness}}%</td>
                        </tr>
                        <tr>
                            <td>Availability:</td>
                            <td>Bottle/Cask/Keg</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('show', $beer) }}" class="btn">詳細</a>
        </div>
    @endforeach
</div>
