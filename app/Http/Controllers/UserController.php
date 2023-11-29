<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $user = User::orderBy('created_at', 'desc')->get();
        return view('user.index', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'status' => 'required',
            'role' => 'required',
            'phone'  => 'required',
            'date'  => 'required',
            'gender' => 'required'
        ], [
            'name.required' => 'Name harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'status.required' => 'Status harus diisi',
            'role.required' => 'Role harus diisi',
            'phone.required' => 'Phone harus diisi',
            'date.required' => 'Date harus diisi',
            'gender.required' => 'Gender harus diisi',
        ]);

        $user = new User($validatedData);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('user');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email,' .$id,
            // 'password' => 'required',
            'status' => 'required',
            'role' => 'required',
            'phone'  => 'required',
            'date'  => 'required',
            'gender' => 'required'
        ], [
            'name.required' => 'Name harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'status.required' => 'Status harus diisi',
            'role.required' => 'Role harus diisi',
            'phone.required' => 'Phone harus diisi',
            'date.required' => 'Date harus diisi',
            'gender.required' => 'Gender harus diisi',
        ]);

        $user = User::find($id);
        $user->update($validatedData);

        return redirect()->route('user');
    }
}
