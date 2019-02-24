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
                                <!--content-->
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
                                <!--content-->
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