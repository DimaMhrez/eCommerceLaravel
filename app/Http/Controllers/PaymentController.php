<?php

namespace App\Http\Controllers;

use App\paymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function show(){

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
            'card' => 'min:10|max:16',
            'CVV' => 'required|digits:3',
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
        $payment-> user_id=Auth::user()->id;

        $payment->save();


        return view('front_end.deliveryMethods');
    }


}
