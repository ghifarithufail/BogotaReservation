<?php

namespace App\Http\Controllers;

use App\Models\LogUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        $user = User::orderBy('created_at', 'desc')->paginate(15);
        return view('user.index', [
            'user' => $user
        ]);
    }

    public function login()
    {
        return view('user.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('password', 'email');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Check if the user's status is 0
            if (Auth::user()->status == '1') {
                return redirect('/reservation');
            } else {
                // If status is not 0, redirect back to login with a statusError message
                return redirect('/login')->with('statusError', 'Akun anda tidak aktif.');
            }
        }

        // If authentication fails or the status is not 0, redirect back to login
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
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

        $log = new LogUser();
        $log->user_id = Auth::user()->id;
        $log->action = 'create';
        $log->doing = 'Create user ' . $request->name;
        $log->save();

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
        $oldUserData = User::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email,' . $id,
            'status' => 'required',
            'role' => 'required',
            'phone'  => 'required',
            'date'  => 'required',
            'gender' => 'required',
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

        $log = new LogUser();
        $log->user_id = Auth::user()->id;
        $log->action = 'update '. $user->name;

        // Compare each attribute and add changes to the log message
        $changes = [];
        if ($oldUserData->name != $user->name) {
            $changes[] = 'name from ' . $oldUserData->name . ' to ' . $user->name;
        }
        if ($oldUserData->phone != $user->phone) {
            $changes[] = 'phone from ' . $oldUserData->phone . ' to ' . $user->phone;
        }
        if ($oldUserData->email != $user->email) {
            $changes[] = 'email from ' . $oldUserData->email . ' to ' . $user->email;
        }
        if ($oldUserData->status != $user->status) {
            $oldStatus = ($oldUserData->status == 1) ? 'aktif' : 'non aktif';
            $newStatus = ($user->status == 1) ? 'aktif' : 'non aktif';
        
            $changes[] = 'status from ' . $oldStatus . ' to ' . $newStatus;
        }
        if ($oldUserData->gender != $user->gender) {
            $oldGender = ($oldUserData->gender == 1) ? 'male' : 'female';
            $newGender = ($user->gender == 1) ? 'male' : 'female';
        
            $changes[] = 'gender from ' . $oldGender . ' to ' . $newGender;
        }
        if ($oldUserData->role != $user->role) {
            $oldRole = ($oldUserData->role == 1) ? 'admin' : 'employee';
            $newRole = ($user->role == 1) ? 'admin' : 'employee';
        
            $changes[] = 'role from ' . $oldRole . ' to ' . $newRole;
        }

        $log->doing = 'update data ' . implode(', ', $changes);
        $log->save();


        return redirect()->route('user');
    }
}
