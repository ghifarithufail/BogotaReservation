<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RsvpController extends Controller{
    public function rsvp(){
        return view("frontEnd.rsvp");
    }

    public function status(){
        return view("frontEnd.status");
    }
}