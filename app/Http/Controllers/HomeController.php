<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function home(){
        return view('layout.default');
    } 
    
    public function index(Request $request)
    {
        $reservations = Reservation::with('Tables')->OrderBy('created_at', 'desc');

        $datas = Reservation::sum('guest');

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
        // if ($request->has('payment')) {
        //     $reservations->appends(['payment' => $payment]);
        // }

        return view('frontEnd.index', compact('reservations','datas'));
    }

    public function template(){

        return view('template');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
