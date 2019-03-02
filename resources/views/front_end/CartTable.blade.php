@section('table')
<section class="shopping-cart padding-bottom-60">
            <div class="container">
                <table id="carttable" class="table">
                    <thead>
                    @if($data['items']->count() !=0)
                    <tr>
                        <th>Articoli</th>
                        <th class="text-center">Prezzo</th>
                        <th class="text-center">Quantità</th>
                        <th class="text-center">Prezzo totale </th>
                        <th>&nbsp; </th>
                    </tr>
                    @else
                        <tr>
                            <th></th>
                        </tr>
                    @endif
                    </thead>
                    <tbody>

                    <!-- Item Cart -->
                    @if($data['items']->count() == 0)
                        <tr class="text-center">
                            <td>
                                <h6> Non c'è nessun articolo nel tuo carrello! </h6>
                            </td>
                        </tr>

                    @endif
@foreach ($data['items'] as $item)
    <tr>
        <td><div class="media">
                <div class="media-left"> <a href="/products/{{$item->id}}"> <img class="img-responsive" src="{{asset('upload/'.$item->URL)}}" alt="Image missing" > </a> </div>
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
        <td class="text-center padding-top-60"><button id="{{$item->cartid}}" class="remove"><i class="fa fa-close"></i></button></td>
    </tr>
    @endforeach

    </tbody>
    </table>
    @if($data['items']->count() != 0)

    <!-- Promotion -->
    <div class="promo">
        <div class="coupen">
            <label> Codice promozionale
                <input form="code" id="code" name="code" type="text" placeholder="Il tuo codice...">
                <button id="codesubmit" type="submit"><i class="fa fa-arrow-circle-right"></i></button>   <b id="result"></b>
            </label>
        </div>

        <!-- Grand total -->
        <div class="g-totel">
            <h5>Importo complessivo: <span>€{{$data['sum']}}</span></h5>
        </div>
    </div>
    @endif
    <!-- Button -->
    <div class="pro-btn">

        <a href="/" class="btn-round btn-light">Continua con gli acquisti</a>
        @if($data['items']->count() != 0)
        <a href="/payment" class="btn-round">Metodi di pagamento</a>
        @endif
    </div>
    </div>

    <script>


        $('#codesubmit').click(function(){
            $.post("/code",
                {
                    pcode: document.getElementById("code").value,
                },
                function(data) {
                    if(data==1){
                        document.getElementById("codesubmit").disabled = true;
                    document.getElementById("result").innerHTML = "Aggiunto!";}
                    else{
                    document.getElementById("result").innerHTML = "Errore. Riprova.";}
                }

            ) });



    </script>
</section>
@show