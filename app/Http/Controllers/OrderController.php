<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
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

        foreach($orderDetails as $detail){
            $product = Product::find($detail->product_id);
            $detail->productName = $product->name;
        }

        return View::make('back_end.orderDetail')->with('details',$orderDetails);
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
            ->addColumn('intro', function(Order $order) {
                return '<a href="'. url('/admin/order/'.$order->id) .'" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i><div class="ripple-container"></div></a>
                        <a href="'. url('/admin/order/'.$order->id.'/edit') .'" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                        <a href="'. url('/admin/') .'" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">euro_symbol</i><div class="ripple-container"></div></a>';
            })
            ->addColumn('user', function(Order $order) {

                if ($order->user_id != null) {
                    $buyer = User::find($order->user_id);
                    return $buyer->name;
                }else{
                    return '<i class="material-icons">highlight_off</i>';
                }
            })
            ->rawColumns(['intro','user'])
            ->toJson();
        //return Datatables::of(User::)

        //return Datatables::eloquent(User::query())->make(true);
    }

    public function preparing()
    {
        return Datatables::of(Order::query()->where('status',1)
            ->select('id','date','status','totalprice','user_id')->orderBy('date','asc'))
            ->setRowId(function ($order){
                return $order->id;
            })
            ->addColumn('intro', function(Order $order) {
                return '<a href="'. url('/admin/order/'.$order->id.'/edit') .'" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                        <a href="'. url('/admin/') .'" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">euro_symbol</i><div class="ripple-container"></div></a>';
            })
            ->addColumn('user', function(Order $order) {

                if ($order->user_id != null) {
                    $buyer = User::find($order->user_id);
                    return $buyer->name;
                }else{
                    return '<i class="material-icons">highlight_off</i>';
                }
            })
            ->rawColumns(['intro','user'])
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
            ->addColumn('intro', function(Order $order) {
                return '<a href="'. url('/admin/order/'.$order->id.'/edit') .'" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                        <a href="'. url('/admin/') .'" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">euro_symbol</i><div class="ripple-container"></div></a>';
            })
            ->addColumn('user', function(Order $order) {

                if ($order->user_id != null) {
                    $buyer = User::find($order->user_id);
                    return $buyer->name;
                }else{
                    return '<i class="material-icons">highlight_off</i>';
                }
            })
            ->rawColumns(['intro','user'])
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
