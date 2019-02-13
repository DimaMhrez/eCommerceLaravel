@extends('front_end.main')

@section('content')

    <!-- Linking -->
    <div class="linking">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Homepage</a></li>
                <li class="active">{{$productsdata['product']->name}}</li>
            </ol>
        </div>
    </div>

    <!-- Content -->
    <div id="content">

        <!-- Products -->
        <section class="padding-top-40 padding-bottom-60">
            <div class="container">
                <div class="row">

                    <!-- Shop Side Bar -->
                    <div class="col-md-3">
                        <div class="shop-side-bar">

                            <!-- Categories -->
                            <h6>Categorie</h6>
                            <div class="checkbox checkbox-primary">
                                <ul>
                                    @foreach($categories as $category)
                                    <li>
                                        <input id="cate1" class="styled" type="checkbox" >
                                        <label for="cate1">{{$category->name}}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Categories -->
                            <h6>Prezzo</h6>
                            <!-- PRICE -->
                            <div class="cost-price-content">
                                <div id="price-range" class="price-range"></div>
                                <span id="price-min" class="price-min">20</span> <span id="price-max" class="price-max">80</span> <a href="#." class="btn-round" >Filtra</a> </div>

                            <!-- Featured Brands -->
                            <h6>Brands in vetrina</h6>
                            <div class="checkbox checkbox-primary">
                                <ul>
                                    @foreach($productsdata['brands'] as $brand)
                                    <li>
                                        <input id="brand1" class="styled" type="checkbox" >
                                        <label for="brand1"> {{$brand->name}}  </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Rating -->
                            <h6>Valutazioni</h6>
                            <div class="rating">
                                <ul>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><span>{{$productsdata['fivestars']->count()}}</span></a></li>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> <span>{{$productsdata['fourstars']->count()}}</span></a></li>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>{{$productsdata['threestars']->count()}}</span></a></li>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>{{$productsdata['twostars']->count()}}</span></a></li>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>{{$productsdata['onestar']->count()}}</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="col-md-9">
                        <div class="product-detail">
                            <div class="product">
                                <div class="row">
                                    <!-- Slider Thumb -->
                                    <div class="col-xs-5">
                                        <article class="slider-item on-nav">
                                            <div class="thumb-slider">
                                                <ul class="slides">
                                                    <li data-thumb="images/item-img-1-1.jpg"> <img src="images/item-img-1-1.jpg" alt="" > </li>
                                                    <li data-thumb="images/item-img-1-2.jpg"> <img src="images/item-img-1-2.jpg" alt="" > </li>
                                                    <li data-thumb="images/item-img-1-3.jpg"> <img src="images/item-img-1-3.jpg" alt="" > </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Item Content -->
                                    <div class="col-xs-7"> <span class="tags">{{$category->name}}</span>

                                        <h5>{{$productsdata['product']->name}}</h5>
                                        <p class="rev">@for($i=0; $i<$productsdata['product']->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i> @endfor <span class="margin-left-10">{{$productsdata['product']->reviewsnumber}}
                                                    Recensioni</span></p>
                                        <div class="row">
                                            <div class="col-sm-6"><span class="price">€{{$productsdata['product']->normalPrice}} </span></div>
                                            <div class="col-sm-6">
                                                <p>Availability: <span class="in-stock">In stock (Da aggiustare)</span></p>
                                            </div>
                                        </div>
                                        <!-- List Details -->
                                        <ul class="bullet-round-list">
                                            @foreach($productsdata['bulletpoints'] as $bullet)
                                            <li>{{$bullet->description}}</li>
                                                @endforeach
                                        </ul>
                                        <!-- Colors -->
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="clr">
                                                    @foreach($productsdata['variants'] as $variant)
                                                    <span style="background:#{{$variant->color}}"></span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Compare Wishlist -->
                                        <ul class="cmp-list">
                                            <li><a href="#."><i class="fa fa-heart"></i>Aggiungi alla Lista Desideri</a></li>
                                            <li><a href="#."><i class="fa fa-envelope"></i>Suggerisci ad un amico</a></li>
                                        </ul>

                                        <!-- Quinty -->
                                        <div class="quinty">
                                            <input type="number" value="01">
                                        </div>
                                        <a href="#." class="btn-round"><i class="icon-basket-loaded margin-right-5"></i>Aggiungi al carrello</a> </div>
                                </div>
                            </div>

                            <!-- Details Tab Section-->
                            <div class="item-tabs-sec">

                                <!-- Nav tabs -->
                                <ul class="nav" role="tablist">
                                    <li role="presentation" class="active"><a href="#pro-detil"  role="tab" data-toggle="tab">Dettagli del prodotto</a></li>
                                    <li role="presentation"><a href="#cus-rev"  role="tab" data-toggle="tab">Recensioni dei clienti</a></li>
                                    <li role="presentation"><a href="#ship" role="tab" data-toggle="tab">Spedizioni e Pagamento</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="pro-detil">
                                        <!-- List Details -->
                                        <ul class="bullet-round-list">
                                            @foreach($productsdata['details'] as $detail)
                                            <li>{{$detail->detail}}</li>
                                            @endforeach
                                        </ul>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Carrier</th>
                                                    <th>Compatibility Rating </th>
                                                    <th>Voice / Text </th>
                                                    <th>Voice / Text </th>
                                                    <th>2G Data </th>
                                                    <th>3G Data </th>
                                                    <th>4G LTE Data </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>AT&T </td>
                                                    <td>Fully Compatible</td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Sprint </td>
                                                    <td>No Voice/Text and Partial Data Connection</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>Q-Mobile </td>
                                                    <td>Partial Data Connection</td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>Verizon Wireless </td>
                                                    <td>No Votice/Text and Partial Data Connection</td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="cus-rev">


                                        <div class="table-responsive">
                                            @foreach($productsdata['reviews'] as $review)
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th> <p class="rev">@for($i=0; $i<$review->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i> @endfor <span class="margin-left-10">
                                                      {{$review->rate}} Stelle  </span></p>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><bold>{{$review->title}} - da {{$review->user}} </bold></td>

                                                </tr>

                                                <tr>
                                                    <td>{{$review->description}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                                @endforeach

                                        </div>


                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="ship"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Related Products -->
                        <section class="padding-top-30 padding-bottom-0">
                            <!-- heading -->
                            <div class="heading">
                                <h2>Prodotti Correlati</h2>
                                <hr>
                            </div>
                            <!-- Items Slider -->
                            <div class="item-slide-4 with-nav">
                                <!-- Product -->
                                @foreach($productsdata['related'] as $related)
                                <div class="product">
                                    <article> <img class="img-responsive" src="images/item-img-1-1.jpg" alt="" >
                                        <!-- Content -->
                                        <span class="tag">{{$productsdata['category']->name}}</span> <a href="#." class="tittle">{{$related->name}}</a>
                                        <!-- Reviews -->
                                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">{{$related->reviewsnumber}} Recensioni</span></p>
                                        <div class="price">{{$related->normalPrice}} </div>
                                        <a href="/products/{{$related->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a>
                                    </article>
                                </div>
                                @endforeach

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

        <!-- Your Recently Viewed Items -->
        <section class="padding-bottom-60">
            <div class="container">

                <!-- heading -->
                <div class="heading">
                    <h2>Your Recently Viewed Items</h2>
                    <hr>
                </div>
                <!-- Items Slider -->
                <div class="item-slide-5 with-nav">
                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="images/item-img-1-1.jpg" alt="" >
                            <!-- Content -->
                            <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7 Perfect For Playing Game</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00 </div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>
                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="images/item-img-1-2.jpg" alt="" > <span class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00 <span>$200.00</span></div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="images/item-img-1-3.jpg" alt="" >
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="images/item-img-1-4.jpg" alt="" > <span class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="images/item-img-1-5.jpg" alt="" >
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="images/item-img-1-6.jpg" alt="" > <span class="sale-tag">-25%</span>

                            <!-- Content -->
                            <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00 <span>$200.00</span></div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="images/item-img-1-7.jpg" alt="" >
                            <!-- Content -->
                            <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" src="images/item-img-1-8.jpg" alt="" > <span class="new-tag">New</span>

                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients img -->
        <section class="light-gry-bg clients-img">
            <div class="container">
                <ul>
                    <li><img src="images/c-img-1.png" alt="" ></li>
                    <li><img src="images/c-img-2.png" alt="" ></li>
                    <li><img src="images/c-img-3.png" alt="" ></li>
                    <li><img src="images/c-img-4.png" alt="" ></li>
                    <li><img src="images/c-img-5.png" alt="" ></li>
                </ul>
            </div>
        </section>
    </div>
@endsection


@section('otherScript')
            <script>
                jQuery(document).ready(function($) {

                    //  Price Filter ( noUiSlider Plugin)
                    $("#price-range").noUiSlider({
                        range: {
                            'min': [ 0 ],
                            'max': [ 1000 ]
                        },
                        start: [40, 940],
                        connect:true,
                        serialization:{
                            lower: [
                                $.Link({
                                    target: $("#price-min")
                                })
                            ],
                            upper: [
                                $.Link({
                                    target: $("#price-max")
                                })
                            ],
                            format: {
                                // Set formatting
                                decimals: 2,
                                prefix: '$'
                            }
                        }
                    })
                })

            </script>

@endsection

