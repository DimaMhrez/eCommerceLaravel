<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\ShippingAddress;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.orders');
    }

    public function orderInPreparation()
    {
        return view('back_end.ordersPreparing');
    }

    public function orderShipped()
    {
        return view('back_end.ordersShipped');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetails = OrderDetail::where('order_id',$id)->select('totalPrice','quantity','product_id','id')->get();
        $order = Order::find($id);

        $shipping_address = ShippingAddress::find($order->shipping_address_id);

        foreach($orderDetails as $detail){
            $product = Product::find($detail->product_id);
            $detail->productName = $product->name;
        }

        return View::make('back_end.orderDetail')->with('details',$orderDetails)->with('order',$order)->with('shipping',$shipping_address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function setInProgress($id){
        $order = Order::find($id);

        $order->status = 1;

        $order->save();

        return view('back_end.ordersPreparing');
    }

    public function setShipped($id){

        $order = Order::find($id);

        $order->status = 2;

        $order->save();

        return view('back_end.ordersShipped');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function anyData()
    {
        return Datatables::of(Order::query()->where('status',0)
            ->select('id','date','status','totalprice','user_id')->orderBy('date','asc'))
            ->setRowId(function ($order){
                return $order->id;
            })
            ->addColumn('formattedDate', function(Order $order) {
                return date('d-m-Y',strtotime($order->date));
            })
            ->addColumn('status', function(Order $order) {
                return '<text class="text-danger">Recevied</text>';
            })
            ->addColumn('intro', function(Order $order) {
                return '<a href="'. url('/admin/order/'.$order->id) .'"><button class="btn btn-info btn-sm">Show Details<div class="ripple-container"></div></button></a>
                        <a href="'. url('/admin/order/'.$order->id.'/inprogress') .'"><button class="btn btn-warning btn-sm">Prepare<div class="ripple-container"></div></button></a>';
            })
            ->addColumn('user', function(Order $order) {

                if ($order->user_id != null) {
                    $buyer = User::find($order->user_id);
                    return $buyer->name;
                }else{
                    return '<i class="material-icons">highlight_off</i>';
                }
            })
            ->rawColumns(['intro','user','formattedDate','status'])
            ->toJson();
        //return Datatables::of(User::)

        //return Datatables::eloquent(User::query())->make(true);
    }

    public function preparing()
    {
        return Datatables::of(Order::query()->where('status',1)
            ->select('id','date','status','totalprice','user_id')->orderBy('date','desc'))
            ->setRowId(function ($order){
                return $order->id;
            })
            ->addColumn('formattedDate', function(Order $order) {
                return date('d-m-Y',strtotime($order->date));
            })
            ->addColumn('status', function(Order $order) {
                return '<text class="text-warning">In Preparation</text>';
            })
            ->addColumn('intro', function(Order $order) {return '<a href="'. url('/admin/order/'.$order->id) .'"><button class="btn btn-info btn-sm">Show Details<div class="ripple-container"></div></button></a>
                        <a href="'. url('/admin/order/'.$order->id.'/shipped') .'"><button class="btn btn-success btn-sm">Ship<div class="ripple-container"></div></button></a>';
            })
            ->addColumn('user', function(Order $order) {

                if ($order->user_id != null) {
                    $buyer = User::find($order->user_id);
                    return $buyer->name;
                }else{
                    return '<i class="material-icons">highlight_off</i>';
                }
            })
            ->rawColumns(['intro','user','formattedDate','status'])
            ->toJson();
        //return Datatables::of(User::)

        //return Datatables::eloquent(User::query())->make(true);
    }

    public function shipped()
    {
        return Datatables::of(Order::query()->where('status',2)
            ->select('id','date','status','totalprice','user_id')->orderBy('date','desc'))
            ->setRowId(function ($order){
                return $order->id;
            })
            ->addColumn('formattedDate', function(Order $order) {
                return date('d-m-Y',strtotime($order->date));
            })
            ->addColumn('intro', function(Order $order) {
                return '<a href="'. url('/admin/order/'.$order->id) .'" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i><div class="ripple-container"></div></a>';
            })
            ->addColumn('status', function(Order $order) {
                return '<text class="text-success">Shipped</text>';
            })
            ->addColumn('user', function(Order $order) {

                if ($order->user_id != null) {
                    $buyer = User::find($order->user_id);
                    return $buyer->name;
                }else{
                    return '<i class="material-icons">highlight_off</i>';
                }
            })
            ->rawColumns(['intro','user','formattedDate','status'])
            ->toJson();
        //return Datatables::of(User::)

        //return Datatables::eloquent(User::query())->make(true);
    }


    /*
    public function pippo($id)
    {
        $orderDetails = OrderDetail::where('order_id',$id)->select('totalPrice','quantity','product_id')->get();

        foreach($orderDetails as $detail){
            $product = Product::find($detail->product_id);
            $detail->productName = $product->name;
        }



        return Datatables::of($orderDetails);
    }*/


}
