<?php

namespace App\Http\Controllers;

use App\Cart;
use App\paymentMethod;
use App\PromotionCode;
use App\Shipper;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function show(){

        $id=Auth::user()->id;

        $items = Cart::where('user_id', $id)
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->select('carts.quantity', 'carts.id as cartid', 'carts.totalprice', 'products.*')
            ->get();

            session(['cartitems' => $items]);

            if (!$items->first())
            {
                return view('front_end.error404');
            }

        return view('front_end.paymentMethods');
    }


    public function store(Request $request){
        //Costruisco un custom validator per mostrare messaggi più chiari e in italiano.

        $messages = [
            'required'    => 'Questo campo è obbligatorio',
            'size'    => 'Questo campo deve contenere esattamente :size caratteri.',
            'between' => 'Questo campo può contenere tra :min e :max caratteri.',
            'digits' => 'Questo campo deve contenere esattamente :digits caratteri.'
        ];


        $validator = Validator::make($request->all(), [
            'card' => 'required',
            'CVV' => 'required|digits:3',
            'cardnumber' => 'required|digits:16',
            'expiremonth' => 'required',
            'expireyear' => 'required',
            'nome' => 'required|max:25|min:3|',
        ], $messages);



        if ($validator->fails()) {
            return redirect('/payment')
                ->withErrors($validator)
                ->withInput();
        }


        $payment= new paymentMethod();

        $payment->method = 'Carta di credito';
        $payment->ccType = $request->card;
        $payment-> ccNumber= $request->CVV;
        $payment-> expire_month= $request->expiremonth;
        $payment-> expire_year= $request->expireyear;
        $payment-> ccOwner= $request->nome;
        $payment-> number = $request->cardnumber;
        $payment-> user_id=Auth::user()->id;

        $payment->save();

        session(['paymentID' => $payment->id]);

        return $this->delivery();
    }

    public function delivery(){

        //Costruisco la nuova vista dei deliverymethods.

        $shippers=Shipper::where('availability','1')->orderBy('price','asc')->take(6)->get();

        if(!session()->has('paymentID'))
        {
            return view('front_end.error404');
        }

        return view('front_end.deliveryMethods')->with('shippers',$shippers);
    }

    public function confirmation(Request $request){

        session(['shipperID'=>$request->radioshipper]);

        $delivery = new ShippingAddress();

        $delivery->name=$request->name;
        $delivery->surname=$request->surname;
        $delivery->street=$request->address;
        $delivery->city=$request->city;
        $delivery->zipcode=$request->cap;
        $delivery->phoneNumber=$request->phone;
        $delivery->user_id=Auth::user()->id;
        $delivery->country=$request->country;
        $delivery->province=$request->province;
        $delivery->email=$request->email;

        $delivery->save();


        $items=session('cartitems');
        $shipperID=session('shipperID');
        $shipper=Shipper::find($shipperID);
        $paymentID=session('paymentID');
        $payment=paymentMethod::find($paymentID);

        $id=Auth::user()->id;

        $sum = Cart::where('user_id', $id)->sum('totalprice');

        if(session()->has('code')) {
            $code = session('code');
            $pcode = PromotionCode::where('code', $code)->first();

            $totalsum = $sum + $shipper->price - $pcode->discount;
        }
        else{
            $totalsum= $sum + $shipper->price;
        }

        $data= array(
            'items' => $items,
            'shipper' => $shipper,
            'payment' => $payment,
            'delivery' => $delivery,
            'sum' => $totalsum,
        );

        return view ('front_end.confirmation',compact('data'));

    }

    public function done(){

        if(!session()->has('paymentID'))
        {
            return view('front_end.error404');
        }


        $id=Auth::user()->id;
        Cart::where('user_id',$id)->delete();

        return view('front_end.checkoutSuccessful');
    }


    public function code(Request $request){

        if (PromotionCode::where('code', '=', $request->code)->exists()) {

            session(['code' => $request->code]);
            return 1;
        }

       return 0;
    }
}
