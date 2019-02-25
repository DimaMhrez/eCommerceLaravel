@extends('front_end.main')

@section('content')

    <!-- Content -->
    <div id="content">

        <!-- Linking -->
        <div class="linking">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Contattaci</li>
                </ol>
            </div>
        </div>

        <!-- Contact -->
        <section class="contact-sec padding-top-40 padding-bottom-80">
            <div class="container">


                <!-- Contact -->
                <div class="contact">
                    <div class="contact-form">
                        <!-- FORM  -->
                        {!!  Form::open(['action'=>'MessageController@store','method'=>'POST', 'id' => 'contact_form', 'class'=>'contact-form']) !!}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="heading">
                                        <h2>Hai una domanda per noi?</h2>
                                    </div>
                                    <ul class="row">
                                        <li class="col-sm-6">
                                            <label>{{Form::label('nome','Nome')}}</label>
                                                {{Form::text('nome', '', ['class' => 'form-control'])}}
                                        </li>
                                        <li class="col-sm-6">
                                            <label>{{Form::label('email','Email')}}</label>
                                                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'La tua email'])}}
                                        </li>
                                        <li class="col-sm-12">
                                            <label>{{Form::label('messaggio','Messaggio')}}</label>
                                                {{Form::textarea('messaggio','', ['class' => 'form-control'])}}
                                        </li>
                                        {{  Form::submit('Invia Messaggio', ['class' => 'btn-round'])      }}

                                    </ul>
                                    {!! Form::close() !!}

                                </div>

                                <!-- Contact Infomation -->
                                <div class="col-md-4">
                                    <div class="contact-info">
                                        <h5>{{$ourbrand->name}}</h5>
                                        <p>{{$ourbrand->description}}</p>
                                        <hr>
                                        <h6> Indirizzo:</h6>
                                        <p>{{$ourbrand->location}}</p>
                                        <h6>Numero di Telefono:</h6>
                                        <p>{{$ourbrand->phoneNumber}}</p>
                                        <h6>Email:</h6>
                                        <p>{{$ourbrand->email}}</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection