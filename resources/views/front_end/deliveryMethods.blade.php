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
                    <li class="col-sm-3 current">
                        <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                        <div class="media-body"> <span>Step 3</span>
                            <h6>Spedizione</h6>
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

        <!-- Payout Method -->
        <section class="padding-bottom-60">
            <div class="container">
                <!-- Payout Method -->
                <div class="pay-method">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Your information -->
                            <div class="heading">
                                <h2>Le tue informazioni</h2>
                                <hr>
                            </div>
                            {!!  Form::open(['action'=>'PaymentController@confirmation','method'=>'POST', 'id' => 'delivery_form', 'class'=>'contact-form']) !!}
                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-sm-6">
                                        <label>{{Form::label('name','Nome')}}</label>
                                        {{Form::text('name', '', ['class' => 'form-control'])}}

                                    </div>


                                    <div class="col-sm-6">
                                        <label>{{Form::label('surname','Cognome')}}</label>
                                        {{Form::text('surname', '', ['class' => 'form-control'])}}

                                    </div>

                                    <!-- Card Number -->
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="country"> Nazione </label>
                                                <select id="country" form="delivery_form" class="selectpicker">
                                                    <option selected value="Italia"> Italia </option>
                                                    <option value="Francia"> Francia </option>
                                                    <option value="USA"> USA</option>
                                                    <option value="Germania"> Germania </option>
                                                    <option value="UK"> UK </option>
                                                </select>
                                            </div>
                                            <!--
                                            <div class="col-xs-6">
                                                <label> City </label>
                                                <select class="selectpicker">
                                                    <option> City</option>
                                                    <option> City</option>
                                                    <option> City</option>
                                                    <option> City</option>
                                                    <option> City</option>
                                                    <option> City</option>
                                                </select>
                                            </div> -->
                                            <div class="col-sm-5">
                                                <label>{{Form::label('province','Provincia')}}</label>
                                                {{Form::text('province', '', ['class' => 'form-control'])}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <label>{{Form::label('city','Città')}}</label>
                                        {{Form::text('city', '', ['class' => 'form-control'])}}

                                    </div>


                                    <!-- Zip code -->
                                    <div class="col-sm-4">
                                        <label>{{Form::label('cap','CAP')}}</label>
                                        {{Form::text('cap', '', ['class' => 'form-control'])}}

                                    </div>

                                    <!-- Address -->
                                    <div class="col-sm-8">
                                        <label>{{Form::label('address','Indirizzo')}}</label>
                                        {{Form::text('address', '', ['class' => 'form-control'])}}

                                    </div>

                                    <!-- Phone -->
                                    <div class="col-sm-6">
                                        <label>{{Form::label('phone','Numero di Telefono')}}</label>
                                        {{Form::text('phone', '', ['class' => 'form-control'])}}

                                    </div>

                                    <!-- Number -->
                                    <div class="col-sm-6">
                                        <label>{{Form::label('email','Indirizzo email')}}</label>
                                        {{Form::text('email', '', ['class' => 'form-control'])}}
                                    </div>
                                </div>

                        </div>

                        <!-- Select Your Transportation -->
                        <div class="col-md-6">
                            <div class="heading">
                                <h2>Metodi di spedizione</h2>
                                <hr>
                            </div>
                            <div class="transportation">
                                <div class="row">

                                   @foreach($shippers as $shipper)
                                        <div class="col-sm-6">
                                                <label class="labl">
                                                <input type="radio" name="radioshipper" id="radioshipper" value="{{$shipper->id}}">
                                                    <div class="charges">
                                                        <h6>{{$shipper->name}}</h6>
                                                        <br>
                                                        <span>{{$shipper->description}}</span>
                                                        @if($shipper->price != 0)
                                                        <span class="deli-charges"> +{{$shipper->price}}€ </span>
                                                            @endif
                                                    </div>
                                                </label>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Button -->
                <div class="pro-btn"> <a href="/payment" class="btn-round btn-light">Torna al pagamento</a>
                    {{  Form::submit('Vai alla conferma', ['class' => 'btn-round'])      }} </div>
            </div>
            {!! Form::close() !!}
        </section>
    </div>
@endsection