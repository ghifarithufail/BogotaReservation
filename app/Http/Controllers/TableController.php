<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::orderBy('tables_name', 'asc')->paginate('15');

        return view('Tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('Tables.create_table');
    }

    public function contoh(){
        return view('Tables.template');
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
        

        Table::create([
            'tables_name' => $request->tables_name,
            'table_guest' => $request->table_guest
        ]);

        return redirect()->route('tables')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }
}
