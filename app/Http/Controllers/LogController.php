<?php

namespace App\Http\Controllers;

use App\Models\LogReservation;
use App\Models\LogTable;
use App\Models\LogUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function logUser(Request $request)
    {
        $date_start = $request->input('date_start', now()->format('Y-m-d'));
        $date_end = $request->input('date_end', now()->format('Y-m-d'));

        $query = LogUser::orderBy('created_at', 'desc');

        if ($date_start) {
            $query->whereDate('created_at', '>=', $date_start);
        }

        if ($date_end) {
            $query->whereDate('created_at', '<=', $date_end);
        }

        $logUser = $query->paginate('25');


        return view('log.user', [
            'request' => [
                'date_start' => $date_start,
                'date_end' => $date_end,
            ],
            'logUser' => $logUser
        ]);
    }

    public function logReservation(Request $request)
    {
        $date_start = $request->input('date_start', now()->format('Y-m-d'));
        $date_end = $request->input('date_end', now()->format('Y-m-d'));

        $query = LogReservation::orderBy('created_at', 'desc');

        if ($date_start) {
            $query->whereDate('created_at', '>=', $date_start);
        }

        if ($date_end) {
            $query->whereDate('created_at', '<=', $date_end);
        }

        $logReservation = $query->paginate('25');

        return view('log.reservation', [
            'request' => [
                'date_start' => $date_start,
                'date_end' => $date_end,
            ],
            'logReservation' => $logReservation
        ]);
    }

    public function logTable(Request $request)
    {
        $date_start = $request->input('date_start', now()->format('Y-m-d'));
        $date_end = $request->input('date_end', now()->format('Y-m-d'));

        $query = LogTable::orderBy('created_at', 'desc');

        if ($date_start) {
            $query->whereDate('created_at', '>=', $date_start);
        }

        if ($date_end) {
            $query->whereDate('created_at', '<=', $date_end);
        }

        $logTable = $query->paginate(20);

        return view('log.table', [
            'request' => [
                'date_start' => $date_start,
                'date_end' => $date_end,
            ],
            'logTable' => $logTable
        ]);
    }
}
