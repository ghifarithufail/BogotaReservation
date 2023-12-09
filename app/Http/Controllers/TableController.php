<?php

namespace App\Http\Controllers;

use App\Models\LogTable;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $log = new LogTable();
        $log->user_id = Auth::user()->id;
        $log->action = 'create';
        $log->log = 'Create Table ' . $request->tables_name . ' And guest is ' .$request->table_guest ;
        $log->save();


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
    public function edit($id)
    {
        $table = Table::find($id);

        return view('Tables.edit', [
            'table' => $table
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $oldTable = Table::find($id);

    $validatedData = $request->validate([
        'tables_name' => 'required|unique:tables,tables_name,' . $id,
        'table_guest' => 'required',
    ], [
        'tables_name.required' => 'Table Harus diisi.',
        'tables_name.unique' => 'Nama table ini sudah ada.',
        'table_guest.required' => 'Guest harus di isi.',
    ]);
    
    $table = Table::find($id);
    $table->update($validatedData);

    $log = new LogTable();
    $log->user_id = Auth::user()->id;
    $log->action = 'update';

    $changes = [];
    if ($oldTable->tables_name != $table->tables_name) {
        $changes[] = 'name table from ' . $oldTable->tables_name . ' to ' . $table->tables_name;
    }
    if ($oldTable->table_guest != $table->table_guest) {
        $changes[] = 'guest from ' . $oldTable->table_guest . ' to ' . $table->table_guest;
    }

    $log->log = 'update data ' . implode(', ', $changes);
    $log->save();

    return redirect()->route('tables');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }
}
