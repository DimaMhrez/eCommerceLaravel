@extends('front_end.main')

@section('content')

    <!-- Content -->
    <div id="content">

        <!-- Ship Process -->
        <div class="ship-process padding-top-30 padding-bottom-30">
            <div class="container">
                <ul class="row">

                    <!-- Step 1 -->
                    <li class="col-sm-3 current">
                        <div class="media-left"> <i class="flaticon-shopping"></i> </div>
                        <div class="media-body"> <span>Step 1</span>
                            <h6>Carrello</h6>
                        </div>
                    </li>

                    <!-- Step 2 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="flaticon-business"></i> </div>
                        <div class="media-body"> <span>Step 2</span>
                            <h6>Metodi di pagamento</h6>
                        </div>
                    </li>

                    <!-- Step 3 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                        <div class="media-body"> <span>Step 3</span>
                            <h6>Metodi di spedizione</h6>
                        </div>
                    </li>

                    <!-- Step 4 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                        <div class="media-body"> <span>Step 4</span>
                            <h6>Conferma</h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Shopping Cart -->
        <section class="shopping-cart padding-bottom-60">
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Articoli</th>
                        <th class="text-center">Prezzo</th>
                        <th class="text-center">Quantità</th>
                        <th class="text-center">Prezzo totale </th>
                        <th>&nbsp; </th>
                    </tr>
                    </thead>
                    <tbody>

                    <!-- Item Cart -->
                    @foreach ($data['items'] as $item)
                    <tr>
                        <td><div class="media">
                                <div class="media-left"> <a href="/products/{{$item->id}}"> <img class="img-responsive" src="images/item-img-1-1.jpg" alt="" > </a> </div>
                                <div class="media-body">
                                    <p>{{$item->name}}</p>
                                </div>
                            </div></td>
                        <td class="text-center padding-top-60">€{{$item->normalPrice}}</td>
                        <td class="text-center"><!-- Quinty -->

                            <div class="quinty padding-top-20">
                                <p>{{$item->quantity}}</p>
                            </div></td>
                        <td class="text-center padding-top-60">€{{$item->totalprice}}</td>
                        <td class="text-center padding-top-60"><a href="#." class="remove"><i class="fa fa-close"></i></a></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

                <!-- Promotion -->
                <div class="promo">
                    <div class="coupen">
                        <label> Promotion Code
                            <input type="text" placeholder="Your code here">
                            <button type="submit"><i class="fa fa-arrow-circle-right"></i></button>
                        </label>
                    </div>

                    <!-- Grand total -->
                    <div class="g-totel">
                        <h5>Importo complessivo: <span>€{{$data['sum']}}</span></h5>
                    </div>
                </div>

                <!-- Button -->
                <div class="pro-btn"> <a href="/" class="btn-round btn-light">Continua con gli acquisti</a> <a href="#." class="btn-round">Metodi di pagamento</a> </div>
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