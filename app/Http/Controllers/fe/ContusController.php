<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use App\Models\Critic;
use Illuminate\Http\Request;

class ContusController extends Controller
{
    public function index(){

        return view("frontEnd.contus");
    }

    public function data(){

        return view("frontEnd.contus");
    }
}