<?php

namespace App\Http\Controllers;

use App\paymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show(){

        return view('front_end.paymentMethods');
    }


    public function store(Request $request){

        //AGGIUNGI VALIDATION!


        $payment= new paymentMethod();

        $payment->method = 'Carta di credito';
        $payment->ccType = $request->card;
        $payment-> ccNumber= $request->CVV;
        $payment-> expire_month= $request->expiremonth;
        $payment-> expire_year= $request->expireyear;
        $payment-> ccOwner= $request->nome;
        $payment-> user_id=Auth::user()->id;

        $payment->save();



    }


}
