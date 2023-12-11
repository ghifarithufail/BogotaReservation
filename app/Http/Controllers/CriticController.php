<?php

namespace App\Http\Controllers;

use App\Models\Critic;
use Illuminate\Http\Request;

class CriticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $critics = Critic::orderBy('created_at','desc')->paginate(15);

        return view('critics.index',compact('critics'));
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
    public function show(Critic $critic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Critic $critic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Critic $critic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Critic $critic)
    {
        //
    }
}
