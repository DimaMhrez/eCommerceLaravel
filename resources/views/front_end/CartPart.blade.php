<!-- Cart Part -->
@section('cartpart')
@if(!Auth::guest())
    <ul class="nav navbar-right cart-pop">
        <li class="dropdown"> <a href="/cart/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">{{$cartnumber}}</span> <i class="flaticon-shopping-bag"></i> <strong>Il mio carrello</strong> <br>
                <span>{{$cartnumber}} item(s)</span></a>
            @if($cartnumber!=0)
                <ul class="dropdown-menu">
                    @foreach($cartitems as $item)
                        <li>
                            <div class="media-left"> <a href="/products/{{$item->id}}" class="thumb"> <img src="{{ asset('upload/'.$item->URL) }}" class="img-responsive" alt="" > </a> </div>
                            <div class="media-body"> <a href="/products/{{$item->product}}" class="tittle">{{$item->productname}}</a>
                                <span>Quantity: {{$item->quantity}} - €{{$item->totalprice}}</span>
                            </div>
                        </li>
                    @endforeach
                        <li class="btn-cart"> <a href="/cart" class="btn-round">Vai al carrello</a> </li>
                        @endif
                </ul>
        </li>
    </ul>
@endif
    @show