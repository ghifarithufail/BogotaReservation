<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyReservationsChart;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MonthlyReservationsChart $chart)
    {
        $user = User::count();
        $sukses = Reservation::where('status','done')->where('cancel','0')->count();
        $price = Reservation::where('status','done')->where('cancel','0')->sum('price');
        $gagal = Reservation::where('cancel','1')->count();
        $chart = $chart->build();


        return view('dashboard.index', compact('user','sukses','gagal','chart','price'));
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
