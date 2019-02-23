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
                        <div class="media-left"> <i class="flaticon-shopping"></i> </div>
                        <div class="media-body"> <span>Step 1</span>
                            <h6>Shopping Cart</h6>
                        </div>
                    </li>

                    <!-- Step 2 -->
                    <li class="col-sm-3 current">
                        <div class="media-left"> <i class="flaticon-business"></i> </div>
                        <div class="media-body"> <span>Step 2</span>
                            <h6>Payment Methods</h6>
                        </div>
                    </li>

                    <!-- Step 3 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                        <div class="media-body"> <span>Step 3</span>
                            <h6>Delivery Methods</h6>
                        </div>
                    </li>

                    <!-- Step 4 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                        <div class="media-body"> <span>Step 4</span>
                            <h6>Confirmation</h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Payout Method -->
        <section class="padding-bottom-60">
            <div class="container">
                <!-- Payout Method -->
                <div class="pay-method">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Your Card -->
                            <div class="heading">
                                <h2>Accettiamo tutti i principali metodi di pagamento.</h2>
                                <hr>
                            </div>
                            {!!  Form::open(['action'=>'PaymentController@store','method'=>'POST']) !!}

                            {{ csrf_field() }}
                            <label for="MasterCard">
                                <input class="cardselector" type="radio" name="card" id="MasterCard" value="MasterCard" checked>
                                <img src="{{asset('front_end/images/mastercard.png')}}" alt="missing">
                                Mastercard
                            </label>


                            <label for="VISA">
                                <input class="cardselector" type="radio" name="card" id="VISA" value="VISA">
                                <img src="{{asset('front_end/images/VISA.png')}}" alt="missing">
                               VISA
                            </label>

                            <label for="discover">
                                <input class="cardselector" type="radio" name="card" id="discover" value="Discover">
                                <img src="{{asset('front_end/images/discover.png')}}" alt="missing">
                                Discover
                            </label>

                            <label for="Paypal">
                                <input class="cardselector" type="radio" name="card" id="Paypal" value="Paypal">
                                <img src="{{asset('front_end/images/paypal.png')}}" alt="missing">
                                Paypal
                            </label>

                            <label for="Americanexpress">
                                <input class="cardselector" type="radio" name="card" id="Americanexpress" value="American Express">
                                <img src="{{asset('front_end/images/american-express.png')}}" alt="missing">
                                American Express
                            </label>


                        </div>

                        <div class="col-md-6">

                            <!-- Your information -->
                            <div class="heading">
                                <h2>Le tue informazioni</h2>
                                <hr>
                            </div>

                                <div class="row">
                                    <!-- Cardholder Name -->
                                    <div class="col-sm-6">


                                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                        {{Form::label('nome','Nome intestatario')}}
                                        {{Form::text('nome', '', ['class' => 'form-control'])}}
                                            <small class="text-danger">{{ $errors->first('nome') }}</small>
                                        </div>

                                    </div>

                                    <!-- Card Number -->
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('card') ? ' has-error' : '' }}">
                                        {{Form::label('cardnumber','Numero carta')}}
                                        {{Form::text('cardnumber', '', ['class' => 'form-control'])}}
                                            <small class="text-danger">{{ $errors->first('card') }}</small>
                                        </div>
                                    </div>


                                    <div class="col-sm-7">
                                        <label for="expiremonth">Scadenza</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group{{ $errors->has('expiremonth') ? ' has-error' : '' }}">
                                                {{
                                                Form::select('expiremonth',
                                                ['01' => '01', '02'=>'02', '03' =>'03', '04'=>'04', '05'=>'05', '06'=>'06',
                                                '07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12'],
                                                '01',['class' => "form-control"])
                                                }}
                                                    <small class="text-danger">{{ $errors->first('expiremonth') }}</small>
                                                </div>

                                            </div>
                                            <span class="col-xs-6">
                                                <div class="form-group{{ $errors->has('expireyear') ? ' has-error' : '' }}">
                                                {{Form::select('expireyear',
                                                ['2019' => '2019', '2020'=>'2020', '2021' =>'2021', '2022'=>'2022', '2023'=>'2023', '2024'=>'2024'],
                                                '2019',['class' => "form-control"])}}
                                                <small class="text-danger">{{ $errors->first('expireyear') }}</small>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group{{ $errors->has('CVV') ? ' has-error' : '' }}">
                                        {{Form::label('CVV','CVV')}}
                                        {{Form::text('CVV', '', ['class' => 'form-control'])}}
                                            <small class="text-danger">{{ $errors->first('CVV') }}</small>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach

                <!-- Button -->
                <div class="pro-btn"> <a href="/cart" class="btn-round btn-light">Torna al carrello</a>
    {{ Form::submit('Vai ai metodi di consegna', ['class' => 'btn-round']) }}
                    {!! Form::close() !!}
                </div>
</div>
</section>

</div>
@endsection