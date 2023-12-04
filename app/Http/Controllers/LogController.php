<?php

namespace App\Http\Controllers;

use App\Models\LogReservation;
use App\Models\LogTable;
use App\Models\LogUser;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function logUser(){
        $logUser = LogUser::orderBy('created_at','desc')->paginate('25');

        return view('log.user', compact('logUser'));
    }

    public function logReservation(){
        $logReservation = LogReservation::orderBy('created_at','desc')->paginate('25');

        return view('log.reservation', compact('logReservation'));
    }

    public function logTable(){
        $logTable = LogTable::orderBy('created_at','desc')->paginate('25');

        return view('log.table', compact('logTable'));
    }
}
