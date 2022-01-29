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
                    <h3>{{$beer->name}}</h3>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>アルコール度数:</td>
                            <td>{{$beer->alcohol}}%</td>
                        </tr>
                        <tr>
                            <td>スタイル:</td>
                            <td>{{$beer->style->name}}</td>
                        </tr>
                        <tr>
                            <td>ブルワリー:</td>
                            <td>{{$beer->brewery->name}}</td>
                        </tr>
                        <tr>
                            <td>苦さ:</td>
                            <td>{{$beer->bitterness}}/5</td>
                        </tr>
                        <tr>
                            <td>甘さ:</td>
                            <td>{{$beer->sweetness}}/5</td>
                        </tr>
                        <tr>
                            <td>酸味:</td>
                            <td>{{$beer->acidity}}/5</td>
                        </tr>
                        <tr>
                            <td>コク:</td>
                            <td>{{$beer->deepness}}/5</td>
                        </tr>
                        <tr>
                            <td>キレ:</td>
                            <td>{{$beer->strength}}/5</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('show', $beer) }}" class="btn">詳細</a>
        </div>
    @endforeach
</div>
