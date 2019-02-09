@extends('front_end.main')

@section('content')

    <!-- Content -->
    <div id="content">

        <!-- Linking -->
        <div class="linking">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Contact</li>
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
                        <form role="form" id="contact_form" class="contact-form" method="post" onSubmit="return false">
                            <div class="row">
                                <div class="col-md-8">

                                    <!-- Payment information -->
                                    <div class="heading">
                                        <h2>Hai una domanda per noi?</h2>
                                    </div>
                                    <ul class="row">
                                        <li class="col-sm-6">
                                            <label>First Name
                                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-6">
                                            <label>Last Name
                                                <input type="text" class="form-control" name="email" id="email" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <label>Message
                                                <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
                                            </label>
                                        </li>
                                        <li class="col-sm-12 no-margin">
                                            <button type="submit" value="submit" class="btn-round" id="btn_submit" onClick="proceed();">Send Message</button>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Conatct Infomation -->
                                <div class="col-md-4">
                                    <div class="contact-info">
                                        <h5>nome}</h5>
                                        <p>descrizione}</p>
                                        <hr>
                                        <h6> Indirizzo:</h6>
                                        <p>indirizzo</p>
                                        <h6>Numero di Telefono:</h6>
                                        <p>numero</p>
                                        <h6>Email:</h6>
                                        <p>email</p>
                                    </div>
                                </div>
                            </div>
                        </form>
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