<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class RsvpController extends Controller{
    public function rsvp(){
        $table = Table::all();

        return view("frontEnd.rsvp", compact('table'));
    }

    public function status($id){
        $reservasi = Reservation::find($id);

        return view("frontEnd.status", compact('reservasi'));
    }
}