@extends('front_end.main')

@section('content')

    <!-- Slid Sec -->
    <section class="slid-sec">
        <div class="container">
            <div class="container-fluid">
                <div class="row">

                    <!-- Main Slider  -->
                    <div class="col-md-9 no-padding">

                        <!-- Main Slider Start -->
                        <div class="tp-banner-container">
                            <div class="tp-banner">
                                <ul>

                                    <!-- SLIDE  -->
                                    @foreach($data['Showcase'] as $showcase)
                                    <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('upload/'.$showcase->URL) }}"  alt="slider"  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat">

                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption sfl tp-resizeme"
                                             data-x="left" data-hoffset="60"
                                             data-y="center" data-voffset="-110"
                                             data-speed="800"
                                             data-start="800"
                                             data-easing="Power3.easeInOut"
                                             data-splitin="chars"
                                             data-splitout="none"
                                             data-elementdelay="0.03"
                                             data-endelementdelay="0.4"
                                             data-endspeed="300"
                                             style="z-index: 5; font-size:30px; font-weight:500; color:#888888;  max-width: auto; max-height: auto; white-space: nowrap;">{{$showcase->category}} </div>

                                        <!-- LAYER NR. 2 -->
                                        <div class="tp-caption sfr tp-resizeme"
                                             data-x="left" data-hoffset="60"
                                             data-y="center" data-voffset="-60"
                                             data-speed="800"
                                             data-start="1000"
                                             data-easing="Power3.easeInOut"
                                             data-splitin="chars"
                                             data-splitout="none"
                                             data-elementdelay="0.03"
                                             data-endelementdelay="0.1"
                                             data-endspeed="300"
                                             style="z-index: 6; font-size:50px; color:#0088cc; font-weight:800; white-space: nowrap;">{{$showcase->name}} </div>

                                        <!-- LAYER NR. 3 -->
                                        <div class="tp-caption sfl tp-resizeme"
                                             data-x="left" data-hoffset="60"
                                             data-y="center" data-voffset="10"
                                             data-speed="800"
                                             data-start="1200"
                                             data-easing="Power3.easeInOut"
                                             data-splitin="none"
                                             data-splitout="none"
                                             data-elementdelay="0.1"
                                             data-endelementdelay="0.1"
                                             data-endspeed="300"
                                             style="z-index: 7;  font-size:24px; color:#888888; font-weight:500; max-width: auto; max-height: auto; white-space: nowrap;">A partire da </div>

                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption sfr tp-resizeme"
                                             data-x="left" data-hoffset="210"
                                             data-y="center" data-voffset="5"
                                             data-speed="800"
                                             data-start="1300"
                                             data-easing="Power3.easeInOut"
                                             data-splitin="chars"
                                             data-splitout="none"
                                             data-elementdelay="0.03"
                                             data-endelementdelay="0.4"
                                             data-endspeed="300"
                                             style="z-index: 5; font-size:36px; font-weight:800;  color:#0088cc;  max-width: auto; max-height: auto; white-space: nowrap;">€{{$showcase->normalPrice}} </div>

                                        <!-- LAYER NR. 4 -->
                                        <div class="tp-caption lfb tp-resizeme scroll"
                                             data-x="left" data-hoffset="60"
                                             data-y="center" data-voffset="80"
                                             data-speed="800"
                                             data-start="1300"
                                             data-easing="Power3.easeInOut"
                                             data-elementdelay="0.1"
                                             data-endelementdelay="0.1"
                                             data-endspeed="300"
                                             data-scrolloffset="0"
                                             style="z-index: 8;"><a href="/products/{{$showcase->id}}" class="btn-round big">Acquista ora!</a> </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Main Slider  -->
                    <div class="col-md-3 no-padding">
                        @foreach($data['Showfeatured'] as $sf)
                        <div class="product">
                            <div class="like-bnr">
                                <div class="position-center-center">
                                    <h5>{{$sf->category}}</h5>
                                    <h4>{{$sf->name}}</h4>
                                    <span class="price">{{$sf->price}}</span>
                                    <a href="/products/{{$sf->id}}" class="btn-round">Acquista ora!</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!-- Shipping Info -->
        <section class="shipping-info">
            <div class="container">
                <ul>

                    <!-- Free Shipping -->
                    <li>
                        <div class="media-left"> <i class="flaticon-delivery-truck-1"></i> </div>
                        <div class="media-body">
                            <h5>Spedizione gratuita</h5>
                            <span>Sugli ordini sopra €99</span></div>
                    </li>
                    <!-- Money Return -->
                    <li>
                        <div class="media-left"> <i class="flaticon-arrows"></i> </div>
                        <div class="media-body">
                            <h5>Rimborso</h5>
                            <span>Entro 30 giorni</span></div>
                    </li>
                    <!-- Support 24/7 -->
                    <li>
                        <div class="media-left"> <i class="flaticon-operator"></i> </div>
                        <div class="media-body">
                            <h5>Supporto 24/7</h5>
                            <span>Numero: {{$ourbrand->phoneNumber}}</span></div>
                    </li>
                    <!-- Safe Payment -->
                    <li>
                        <div class="media-left"> <i class="flaticon-business"></i> </div>
                        <div class="media-body">
                            <h5>Pagamento protetto</h5>
                            <span>Pagamento online sicuro</span></div>
                    </li>
                </ul>
            </div>
        </section>

        <!-- tab Section -->
        <section class="featur-tabs padding-top-60 padding-bottom-60">
            <div class="container">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-pills margin-bottom-40" role="tablist">
                    <li role="presentation" class="active"><a href="#featur" aria-controls="featur" role="tab" data-toggle="tab">Featured</a></li>
                    <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">Special</a></li>
                    <li role="presentation"><a href="#on-sal" aria-controls="on-sal" role="tab" data-toggle="tab">Onsale</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Featured -->
                    <div role="tabpanel" class="tab-pane active fade in" id="featur">
                        <!-- Items Slider -->
                        <div class="item-slide-5 with-nav">
                            <!-- Product -->
                            @foreach($data['Featured'] as $Fitem)
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('upload/'.$Fitem->URL) }}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">{{$Fitem->category}}</span> <a href="/products/{{$Fitem->id}}" class="tittle">{{$Fitem->name}}</a>
                                    <!-- Reviews -->
                                    <p class="rev"><span class="margin-left-10">{{$Fitem->reviewsnumber}} Recensioni</span></p>
                                   @if (!empty($Fitem->rate))
                                        <p class="rev">@for($i=0; $i<$Fitem->rate && $i<5; ++$i)<i class="fa fa-star"></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i> @endfor <span class="margin-left-10"></span></p>
                                    @else <p class="rev"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
                                    @endif
                                    <div class="price">€{{$Fitem->normalPrice}}</div>
                                    <a href="/products/{{$Fitem->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Special -->
                    <div role="tabpanel" class="tab-pane fade" id="special">
                        <!-- Items Slider -->
                        <div class="item-col-5">
                            @foreach($data['Special'] as $Sitem)
                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('upload/'.$Sitem->URL) }}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">{{$Sitem->category}}</span> <a href="/products/{{$Sitem->id}}" class="tittle">{{$Sitem->name}}</a>
                                    <!-- Reviews -->
                                    <p class="rev"> <span class="margin-left-10">{{$Sitem->reviewsnumber}} Recensioni </span></p>
                                    @if (!empty($Sitem->rate))
                                        <p class="rev">@for($i=0; $i<$Sitem->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i> @endfor <span class="margin-left-10"></span></p>
                                    @else <p class="rev"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
                                    @endif
                                    <div class="price">€{{$Sitem->normalPrice}}.00 </div>
                                    <a href="/products/{{$Sitem->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- on sale -->
                    <div role="tabpanel" class="tab-pane fade" id="on-sal">
                        <!-- Items Slider -->
                        <div class="item-col-5">
                            @foreach($data['Sale'] as $onsaleitem)
                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('upload/'.$onsaleitem->URL) }}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">{{$onsaleitem->category}} </span> <a href="/products/{{$onsalitem->id}}" class="tittle">{{$onsaleitem->name}}</a>
                                    <!-- Reviews -->
                                    <p class="rev"> <span class="margin-left-10">{{$onsaleitem->reviewsnumber}} Recensioni</span></p>
                                    <div class="price">€{{$onsaleitem->normalPrice}}.00 </div>
                                    @if (!empty($onsaleitem->rate))
                                        <p class="rev">@for($i=0; $i<$onsaleitem->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i> @endfor <span class="margin-left-10">{{$productsdata['product']->reviewsnumber}}</span></p>
                                    @else <p class="rev"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
                                    @endif
                                    <a href="/products/{{$onsaleitem->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(\Illuminate\Support\Facades\Auth::guest())
        <!-- Top Selling Week -->
        <section class="light-gry-bg padding-top-60 padding-bottom-30">
            <div class="container">

                <!-- heading -->
                <div class="heading">
                    <h2>Prodotti in evidenza</h2>
                    <hr>
                </div>

                <!-- Items -->
                <div class="item-col-5">

                    <!-- Product -->
                    <div class="product col-2x">
                        <div class="like-bnr">
                            <div class="position-center-center">
                                <h5>Smart Watch 2.0</h5>
                                <p>Space Gray Aluminum Case
                                    with Black/Volt Real Sport Band <span>38mm | 42mm</span> </p>
                                <a href="#." class="btn-round">View Detail</a> </div>
                        </div>
                    </div>
                    @foreach($data['Featured'] as $featured)
                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="{{asset('upload/'.$featured->URL) }}" alt="" > <span class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">{{$featured->category}}</span> <a href="#." class="tittle">{{$featured->name}}</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">{{$featured->reviewsnumber}} Recensioni</span></p>
                            <div class="price">{{$featured->normalPrice}} <span>{{$featured->normalPrice + 20}}</span></div>
                            <a href="/products/{{$featured->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
            @else
            <!-- Top Selling Week -->
                <section class="light-gry-bg padding-top-60 padding-bottom-30">
                    <div class="container">

                        <!-- heading -->
                        <div class="heading">
                            <h2>Consigliati per te</h2>
                            <hr>
                        </div>

                        <!-- Items -->
                        <div class="item-col-5">

                        @foreach($data['preferences'] as $preference)
                            <!-- Product -->
                                <div class="product">
                                    <article> <img class="img-responsive" src="{{asset('upload/'.$preference->URL) }}" alt="" >

                                        <!-- Content -->
                                        <span class="tag">{{$preference->category}}</span> <a href="/products/{{$preference->id}}" class="tittle">{{$preference->name}}</a>
                                        <!-- Reviews -->
                                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">{{$preference->reviewsnumber}} Recensioni</span></p>
                                        <div class="price">{{$preference->normalPrice}}</div>
                                        <a href="/products/{{$preference->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>
        @endif

        <!-- Main Tabs Sec -->
        <section class="main-tabs-sec padding-top-60 padding-bottom-0">
            <div class="container">
                <ul class="nav margin-bottom-40" role="tablist">
                    <li role="presentation" class="active"><a href="#tv-au" aria-controls="featur" role="tab" data-toggle="tab"> <i class="flaticon-computer"></i> TV & Audio <span>{{$data['tv']->count()}} Articoli</span></a></li>
                    <li role="presentation"><a href="#smart" aria-controls="special" role="tab" data-toggle="tab"><i class="flaticon-smartphone"></i>Smartphone <span>{{$data['smartphones']->count()}} Articoli</span></a></li>
                    <li role="presentation"><a href="#deks-lap" aria-controls="on-sal" role="tab" data-toggle="tab"><i class="flaticon-laptop"></i>PC & Laptop <span>{{$data['pc']->count()}} Articoli</span></a></li>
                    <li role="presentation"><a href="#game-com" aria-controls="special" role="tab" data-toggle="tab"><i class="flaticon-gamepad-1"></i>Game Consoles <span>{{$data['games']->count()}} Articoli</span></a></li>
                    <li role="presentation"><a href="#watches" aria-controls="on-sal" role="tab" data-toggle="tab"><i class="flaticon-computer-1"></i> Orologi <span>{{$data['watches']->count()}} Articoli</span></a></li>
                    <li role="presentation"><a href="#access" aria-controls="on-sal" role="tab" data-toggle="tab"><i class="flaticon-keyboard"></i>Accessori <span>{{$data['accessories']->count()}} Articoli</span></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- TV & Audios -->
                    <div role="tabpanel" class="tab-pane active fade in" id="tv-au">

                        <!-- Items -->
                        <div class="item-slide-5 with-bullet no-nav">
                            <!-- Product -->
                            @foreach($data['tv'] as $tv)
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('upload/'.$tv->URL) }}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">{{$tv->category}}</span> <a href="#." class="tittle">{{$tv->name}}</a>
                                    <!-- Reviews -->
                                    <p class="rev">@for($i=0; $i<$tv->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i>@endfor<span class="margin-left-10">{{$tv->reviewsnumber}} Recensioni</span></p>
                                    <div class="price">{{$tv->normalPrice}} </div>
                                    <a href="/products/{{$tv->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Smartphones -->
                    <div role="tabpanel" class="tab-pane fade" id="smart">
                        <!-- Items -->
                        <div class="item-col-5">

                            <!-- Product -->
                            @foreach($data['smartphones'] as $smartphone)
                                <div class="product">
                                    <article> <img class="img-responsive" src="{{asset('upload/'.$smartphone->URL) }}" alt="" >
                                        <!-- Content -->
                                        <span class="tag">{{$smartphone->category}}</span> <a href="#." class="tittle">{{$smartphone->name}}</a>
                                        <!-- Reviews -->
                                        <p class="rev">@for($i=0; $i<$smartphone->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i>@endfor<span class="margin-left-10">{{$smartphone->reviewsnumber}} Recensioni</span></p>
                                        <div class="price">{{$smartphone->normalPrice}} </div>
                                        <a href="/products/{{$smartphone->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                                </div>
                        @endforeach

                        </div>
                    </div>
                    <!-- Desk & Laptop -->
                    <div role="tabpanel" class="tab-pane fade" id="deks-lap">

                        <!-- Items -->
                        <div class="item-col-5">

                            <!-- Product -->
                            @foreach($data['pc'] as $pc)
                                <div class="product">
                                    <article> <img class="img-responsive" src="{{asset('upload/'.$pc->URL) }}" alt="" >
                                        <!-- Content -->
                                        <span class="tag">{{$pc->category}}</span> <a href="/products/{{$pc->id}}" class="tittle">{{$pc->name}}</a>
                                        <!-- Reviews -->
                                        <p class="rev">@for($i=0; $i<$pc->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i>@endfor<span class="margin-left-10">{{$pc->reviewsnumber}} Recensioni</span></p>
                                        <div class="price">{{$pc->normalPrice}} </div>
                                        <a href="/products/{{$pc->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                                </div>
                        @endforeach

                        </div>
                    </div>
                    <!-- Game Console -->
                    <div role="tabpanel" class="tab-pane fade" id="game-com">
                        <!-- Items -->
                        <div class="item-col-5">
                            <!-- Product -->
                            @foreach($data['games'] as $game)

                                <div class="product">
                                    <article> <img class="img-responsive" src="{{asset('upload/'.$game->URL) }}" alt="" >
                                        <!-- Content -->
                                        <span class="tag">{{$game->category}}</span> <a href="/products/{{$game->id}}" class="tittle">{{$game->name}}</a>
                                        <!-- Reviews -->
                                        <p class="rev">@for($i=0; $i<$game->rate && $i<5; ++$i)<i class="fa fa-star"></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i>@endfor<span class="margin-left-10">{{$game->reviewsnumber}} Recensioni</span></p>
                                        <div class="price">{{$game->normalPrice}} </div>
                                        <a href="/products/{{$game->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Watches -->
                    <div role="tabpanel" class="tab-pane fade" id="watches">

                        <!-- Items -->
                        <div class="item-col-5">

                            <!-- Product -->
                            @foreach($data['watches'] as $watch)
                                <div class="product">
                                    <article> <img class="img-responsive" src="{{asset('upload/'.$watch->URL) }}" alt="" >
                                        <!-- Content -->
                                        <span class="tag">{{$watch->category}}</span> <a href="/products/{{$watch->id}}" class="tittle">{{$watch->name}}</a>
                                        <!-- Reviews -->
                                        <p class="rev">@for($i=0; $i<$watch->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i>@endfor<span class="margin-left-10">{{$watch->reviewsnumber}} Recensioni</span></p>
                                        <div class="price">{{$watch->normalPrice}} </div>
                                        <a href="/products/{{$watch->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                                </div>
                        @endforeach
                        </div>
                    </div>
                    <!-- Accessories -->
                    <div role="tabpanel" class="tab-pane fade" id="access">

                        <!-- Items -->
                        <div class="item-col-5">

                            <!-- Product -->
                            @foreach($data['accessories'] as $acc)
                                <div class="product">
                                    <article> <img class="img-responsive" src="{{asset('upload/'.$acc->URL) }}" alt="" >
                                        <!-- Content -->
                                        <span class="tag">{{$acc->category}}</span> <a href="/products/{{$acc->id}}" class="tittle">{{$acc->name}}</a>
                                        <!-- Reviews -->
                                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">{{$acc->reviewsnumber}} Recensioni</span></p>
                                        <div class="price">{{$acc->normalPrice}} </div>
                                        <a href="/products/{{$acc->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                                </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

