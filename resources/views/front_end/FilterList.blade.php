<div class="col-md-9">

    <!-- Short List -->
    <div class="short-lst">
        <h2>Tutti i prodotti</h2>
        <ul>
            <!-- Short List -->
            <li>
                <p>Totale: {{$data['productsnumber']}} risultati</p>
            </li>
        </ul>
    </div>

    <!-- Items -->
    <div class="col-list">

    @foreach($data['product'] as $product)
        <!-- Product -->
            <div class="product">
                <article>
                    <!-- Product img -->
                    <div class="media-left">
                        <div class="item-img"> <img class="img-responsive" src="{{asset('upload/'.$product->URL) }}" alt="image missing" >  </div>
                    </div>
                    <!-- Content -->
                    <div class="media-body">
                        <div class="row">
                            <!-- Content Left -->
                            <div class="col-sm-7"> <span class="tag">{{$product->category}}</span> <a href="/products/{{$product->id}}" class="tittle">{{$product->name}}</a>
                                <!-- Reviews -->
                                @if (!empty($product->rate))
                                    <p class="rev">@for($i=0; $i<$product->rate && $i<5; ++$i)<i class="fa fa-star"></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i> @endfor <span class="margin-left-10"></span></p>
                                @else <p class="rev"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
                                @endif

                                <ul class="bullet-round-list">

                                        @foreach($product->bullets as $bullet)
                                            <li>{{$bullet->description}}</li>
                                        @endforeach

                                </ul>
                            </div>
                            <!-- Content Right -->
                            <div class="col-sm-5 text-center"> <a href="#." class="heart"><i class="fa fa-heart"></i></a>
                                <div class="position-center-center">
                                    <div class="price">€{{$product->normalPrice}}</div>
                                    <p>Disponibilità: <span class="in-stock">In stock</span></p>
                                    <a href="/products/{{$product->id}}" class="btn-round"><i class="icon-basket-loaded"></i> Vai al prodotto</a> </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
    @endforeach

    <!-- pagination
              <ul class="pagination">
                <li> <a href="#" aria-label="Previous"> <i class="fa fa-angle-left"></i> </a> </li>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li> <a href="#" aria-label="Next"> <i class="fa fa-angle-right"></i> </a> </li>
                -->
    </div>
</div>