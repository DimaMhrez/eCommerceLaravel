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

        <!-- Shopping Cart -->

       <div class="tablecointaner">
           @include('front_end.cartTable')
       </div>

    </div>

    <script>

            $(".remove").click(function () {
                $.post("/removefromcart",
                    {
                       id: this.id,
                    },
                    //If that succeeds:
                    function (data) {
                        $('.tablecointaner').empty().append( data );
                    }

                )
            });


    </script>
@endsection