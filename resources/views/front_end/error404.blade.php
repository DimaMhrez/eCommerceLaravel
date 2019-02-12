@extends('front_end.main')
@section('content')

    <!-- Content -->
    <div id="content">

        <!-- Error Page -->
        <section>
            <div class="container">
                <div class="order-success error-page"> <img src="images/error-img.jpg" alt="" >
                    <h3>Errore <span>404</span> Pagina non trovata</h3>
                    <p>Ci dispiace, ma la pagina che stai cercando non esiste.<br>
                        Puoi tornare alla <a href="/">homepage</a> o usare la barra di ricerca.</p>
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
@endsection