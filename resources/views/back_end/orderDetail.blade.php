@extends('back_end.main')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-header-icon card-header-rose">
                                <div class="card-icon">
                                    <i class="material-icons">info</i>
                                </div>
                                <h4 class="card-title ">Order's Information</h4>
                            </div>

                            <div class="card-body">
                                <h6>Date: <p class="text-info">{{date('d-m-Y',strtotime($order->date))}}</p> </h6>

                            </div>
                            <div class="card-body">
                                <h6>Status:
                                @if($order->status==0)
                                    <p class="text-danger">Recevied</p>
                                @elseif($order->status==1)
                                    <p class="text-warning">In Preparation</p>
                                @else
                                    <p class="text-success">Shipped</pclass>
                                @endif
                                </h6>
                            </div>
                            <div class="card-body">
                                <h6>Note: <p class="text-info">{{$order->note}}</p></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-header-icon card-header-rose">
                                <div class="card-icon">
                                    <i class="material-icons">directions_car</i>
                                </div>
                                <h4 class="card-title ">Shipping Address</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <h6>Name & Surname: <p class="text-info">{{$shipping->name.' '/*.$shipping->surname*/}}</p></h6>
                                </div>
                                <div class="card-body">
                                    <h6>City & ZIP Code: <p class="text-info">{{$shipping->city.' '.$shipping->zipcode}}</p></h6>
                                </div>
                                <div class="card-body">
                                    <h6>Street & Number: <p class="text-info">{{$shipping->street.' '.$shipping->number}}</p></h6>
                                </div>
                                <div class="card-body">
                                    <h6>Phone Number: <p class="text-info">{{$shipping->phoneNumber}}</p></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon card-header-rose">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title ">Products</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <tr><th>
                                                ID
                                            </th>
                                            <th>
                                                Product
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Total Price
                                            </th>
                                        </tr></thead>
                                        <tbody>
                                            @foreach ($details as $detail)
                                                <tr>
                                                    <td>
                                                        {{ $detail->id }}
                                                    </td>
                                                    <td>
                                                        {{ $detail->productName }}
                                                    </td>
                                                    <td>
                                                        {{ $detail->quantity }}
                                                    </td>
                                                    <td>
                                                        {{ $detail->totalPrice }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="td-total">
                                                    Total: {{ $order}} <small>€</small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection