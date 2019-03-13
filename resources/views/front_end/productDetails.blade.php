@extends('front_end.main')

@section('content')
<p hidden id="hiddenID">{{$productsdata['product']->id}}</p>
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
                            <form id="filter" action="/search" method="GET">
                                @csrf
                                <h6>Categorie</h6>
                                <div class="checkbox checkbox-primary">
                                    <ul>
                                        @foreach($productsdata['categories'] as $category)
                                            <li>
                                                <input type="hidden" value="" id="researchstring" name="researchstring">
                                                <input name="category[]" form="filter" id="cat-{{$category->id}}" value="{{$category->name}}" class="styled" type="checkbox" >
                                                <label for="cat-{{$category->id}}"> {{$category->name}} </label>
                                            </li>
                                        @endforeach
                                            <input type="submit" form="filter" value="Filter" class="btn-round">
                                    </ul>
                                </div>




                            </form>
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
                                                    @foreach($productsdata['images'] as $image)
                                                    <li data-thumb="{{asset('upload/'.$image->URL) }}"> <img src="{{asset('upload/'.$image->URL) }}" alt="missing image" > </li>
                                                    @endforeach
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
                                                <p>Disponibilità: <span class="in-stock">In stock</span></p>
                                            </div>
                                        </div>
                                        <!-- List Details -->
                                        <ul class="bullet-round-list">
                                            @foreach($productsdata['bulletpoints'] as $bullet)
                                            <li>{{$bullet->description}}</li>
                                                @endforeach
                                        </ul>
                                        <!-- Colors -->
                                        <!-- <div class="row">
                                            <div class="col-xs-5">
                                                <div class="clr">

                                                    <span style="background:#"></span>

                                                </div>
                                            </div>
                                        </div> -->


                                        <!-- Quinty -->
                                        <div class="quinty">
                                            <input id="number" type="number" value="01">
                                        </div>

                                        <button id="cart" class="btn-round"><i class="icon-basket-loaded margin-right-5"></i>Aggiungi al carrello </button>

                                    </div>
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
                                            {!!  $productsdata['product']->description !!}
                                        </ul>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="cus-rev">
                                        @if(!Auth::guest() && $productsdata['usercanreview']==true )

                                        <button type="button" class="btn-round" id="formButton">Scrivi una recensione!</button>

                                        @endif

                                        {!!  Form::open(['action'=>'ReviewController@store','method'=>'POST', 'id' => 'form1', 'class'=>'contact-form']) !!}

                                        <label>{{Form::label('rate','Rate')}}</label>
                                            <p>{{Form::radio('rate', '1',true)}} <i class="fa fa-star"></i></p>
                                            <p>{{Form::radio('rate', '2')}} <i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                            <p>{{Form::radio('rate', '3')}} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                            <p>{{Form::radio('rate', '4')}} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                            <p>{{Form::radio('rate', '5')}} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>

                                            <label>{{Form::label('product_id','Product_id')}}</label>
                                            {{Form::hidden('product_id',$productsdata['product']->id,['class'=>'form-control','readonly'=>'true'])}}

                                        <label>{{Form::label('title','Title')}}</label>
                                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Il titolo della tua recensione'])}}

                                        <label>{{Form::label('review','Testo')}}</label>
                                        {{Form::textarea('review','', ['class' => 'form-control', 'placeholder' => 'Il testo della tua recensione'])}}

                                        {{  Form::submit('Invia Recensione', ['class' => 'btn-round'])  }}

                                        {!! Form::close() !!}

                                        <div class="table-responsive">
                                            @foreach($productsdata['product']->reviews as $review)
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
                                                    <td><strong>{{$review->title}} - da {{$review->user->name}} </strong></td>

                                                </tr>

                                                <tr>
                                                    <td>{{$review->description}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                                @endforeach

                                        </div>


                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="ship">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Corriere</th>
                                                    <th>Informazioni </th>
                                                    <th>Prezzo </th>
                                                    <th>Disponibilità</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($productsdata['shippers'] as $shipper)
                                                <tr>
                                                    <td>{{$shipper->name}}</td>
                                                    <td>{{$shipper->description}}</td>
                                                    <td>€{{$shipper->price}}</td>
                                                    @if($shipper->availability==1)
                                                    <td class="text-center"><i class="fa fa-check"></i></td>
                                                        @else
                                                        <td></td>
                                                        @endif
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            </div>
        </section>

        <!-- Your Recently Viewed Items -->
        <section class="padding-bottom-60">
            <div class="container">

                <!-- heading -->
                <div class="heading">
                    <h2>Altri prodotti in questa categoria</h2>
                    <hr>
                </div>
                <!-- Items Slider -->
                <div class="item-slide-5 with-nav">
                    <!-- Product -->
                    @foreach($productsdata['related'] as $related)
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('upload/'.$related->URL) }}" alt="" >
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

<!-- My scripts -->
            <script>
            $("#formButton").click(function(){
            $("#form1").toggle();
            });
            </script>

            <script>


                $('#cart').click(function(){
                    $.post("/addtocart",
                        {
                            number: document.getElementById("number").value,
                            itemid: $('#hiddenID').text(),
                        },
                        function(data) {
                            $('#cartpartcontainer').empty().append( data );
                            document.getElementById("cart").innerHTML = "Aggiunto!";
                            document.getElementById("cart").disabled = true;
                    }

                    ) });



            </script>


@endsection
