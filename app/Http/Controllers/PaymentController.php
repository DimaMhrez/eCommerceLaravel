<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(){

        return view('front_end.paymentMethods');
    }
}