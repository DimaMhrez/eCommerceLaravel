@extends('front_end.main')
@section('content')

    <!-- Content -->
    <div id="content">

        <!-- Ship Process -->
        <div class="ship-process padding-top-30 padding-bottom-30">
            <div class="container">
                <ul class="row">

                    <!-- Step 1 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                        <div class="media-body"> <span>Step 1</span>
                            <h6>Carrello</h6>
                        </div>
                    </li>

                    <!-- Step 2 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                        <div class="media-body"> <span>Step 2</span>
                            <h6>Metodi di pagamento</h6>
                        </div>
                    </li>

                    <!-- Step 3 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                        <div class="media-body"> <span>Step 3</span>
                            <h6>Spedizione</h6>
                        </div>
                    </li>

                    <!-- Step 4 -->
                    <li class="col-sm-3 current">
                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                        <div class="media-body"> <span>Step 4</span>
                            <h6>Conferma</h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Payout Method -->
        <section class="padding-bottom-60">
            <div class="container">
                <!-- Payout Method -->
                <div class="pay-method check-out">

                    <!-- Shopping Cart -->
                    <div class="heading">
                        <h2>Carrello</h2>
                        <hr>
                    </div>

                    <!-- Check Item List -->
                    @foreach($data['items'] as $item)
                    <ul class="row check-item">
                        <li class="col-xs-6">
                            <p> {{$item->name}}</p>
                        </li>
                        <li class="col-xs-2 text-center">
                            <p>Quantità: {{$item->quantity}}</p>
                        </li>
                        <li class="col-xs-2 text-center">
                            <p>€{{$item->totalprice}}</p>
                        </li>
                    </ul>
                    @endforeach


                    <!-- Payment information -->
                    <div class="heading margin-top-50">
                        <h2>Informazioni di pagamento</h2>
                        <hr>
                    </div>

                    <!-- Check Item List -->
                    <ul class="row check-item">
                        <li class="col-xs-6">
                            <p><img class="margin-right-20" src="{{asset('front_end/images/'.$data['payment']->ccType.'.png')}}" alt="">{{$data['payment']->ccType}}</p>
                        </li>
                        <li class="col-xs-6 text-center">
                            <p>Numero Carta:  {{$data['payment']->number}}</p>
                        </li>
                    </ul>

                    <!-- Delivery infomation -->
                    <div class="heading margin-top-50">
                        <h2>Informazioni di spedizione</h2>
                        <hr>
                    </div>

                    <!-- Information -->
                    <ul class="row check-item infoma">
                        <li class="col-sm-3">
                            <h6>Nome</h6>
                            <span>{{$data['delivery']->name}}</span> </li>
                        <li class="col-sm-3">
                            <h6>Telefono</h6>
                            <span>{{$data['delivery']->telephone}}</span> </li>
                        <li class="col-sm-3">
                            <h6>Nazione</h6>
                            <span>Italia</span> </li>
                        <li class="col-sm-3">
                            <h6>Email</h6>
                            <span>{{$data['delivery']->email}}</span> </li>
                        <li class="col-sm-3">
                            <h6>Città</h6>
                            <span>{{$data['delivery']->city}}</span> </li>
                        <li class="col-sm-3">
                            <h6>State</h6>
                            <span>NewYork</span> </li>
                        <li class="col-sm-3">
                            <h6>CAP</h6>
                            <span>{{$data['delivery']->zipcode}}</span> </li>
                        <li class="col-sm-3">
                            <h6>Indirizzo</h6>
                            <span>{{$data['delivery']->street}}</span> </li>
                    </ul>

                    <!-- Information -->
                    <ul class="row check-item infoma exp">
                        <li class="col-sm-6"> <span>{{$data['shipper']->name}}</span> </li>
                        <li class="col-sm-3">
                            <h6>{{$data['shipper']->description}}</h6>
                        </li>
                        <li class="col-sm-3">
                            <h5>+{{$data['shipper']->price}} €</h5>
                        </li>
                    </ul>

                    <!-- Totel Price -->
                    <div class="totel-price">
                        <h4><small> Prezzo totale: </small>€{{$data['sum']}}</h4>
                    </div>
                </div>

                <!-- Button -->
                <div class="pro-btn"> <a href="/cart" class="btn-round btn-light">Torna al carrello</a> <a href="/done" class="btn-round">Conferma</a> </div>
            </div>
        </section>
    </div>
@endsection