<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContusController extends Controller
{
    public function contus(){
        return view("frondEnd.contus");
    }
}