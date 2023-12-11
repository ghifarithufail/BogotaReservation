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

    public function data()
    {
        $critics = Critic::orderBy('created_at','desc')->paginate(15);

        return view('critics.index',compact('critics'));
    }
}