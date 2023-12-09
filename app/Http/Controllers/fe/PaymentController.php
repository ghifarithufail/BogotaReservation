<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(){
        return view("frontEnd.payment");
    }

    public function fixPayment(){
        return view("frontEnd.fixPayment");
    }


}