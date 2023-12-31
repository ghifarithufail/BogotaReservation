<?php

namespace App\Http\Controllers;

use App\Models\Critic;
use App\Models\Times;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('times.index');
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
        $this->validate($request, [
            'tables_name' => 'required|unique:tables',
            'table_guest' => 'required',
        ], [
            'tables_name.required' => 'Table Harus diisi.',
            'tables_name.unique' => 'Nama table ini sudah ada.',
            'table_guest.required' => 'Guest harus di isi.',
        ]);
        
        Critic::create([
            'tables_name' => $request->tables_name,
            'table_guest' => $request->table_guest
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Times $times)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Times $times)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Times $times)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Times $times)
    {
        //
    }
}
