<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request){
        $reservations = Reservation::with('Tables')->OrderBy('created_at', 'desc');

        if ($request->has('search')) {
            $search = $request->search;
            $reservations = $reservations->where(function($query) use($search){
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere(function($query) use($search){
                        $query->whereHas('Tables', function($Tables) use($search){
                            $Tables->where('name','like', '%' . $search . '%');
                        });
                    });
                });
        }

        if($request->has('tables')) {
            $tables = $request->tables;
            $reservations = $reservations->whereHas('Tables', function($query) use($tables){
                $query->where('name', 'like', '%' . $tables . '%');
            });
        }

        if($request->has('date')){
            $date = $request->date;
            $reservations = $reservations->where( 'date', 'like', '%' . $date . '%');
        }

        if($request->has('payment')){
            $payment = $request->payment;
            $reservations = $reservations->where( 'status', 'like','%'. $payment.'%' );
        }

        $reservations = $reservations->paginate(5);

        if ($request->has('search')) {
            $reservations->appends(['search' => $search]);
        }
        if ($request->has('tables')) {
            $reservations->appends(['tables' => $tables]);
        }
        if ($request->has('date')) {
            $reservations->appends(['date' => $date]);
        }

        return view('report.reservation', compact('reservations'));
    }
}
