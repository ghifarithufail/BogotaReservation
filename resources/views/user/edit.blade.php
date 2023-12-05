@extends('layout.default')
@section('contents')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">User Edit</h1>
            </div>
            <div class="card-body shadow">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="{{ route('user/update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 mt-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" name="name" placeholder="Masukan name Anda"
                                            value="{{ $user->name }}" class="form-control" aria-describedby="emailHelp">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="text" name="email" placeholder="Masukan email"
                                            value="{{ $user->email }}" class="form-control" aria-describedby="emailHelp">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Birthday</label>
                                        <input type="date" name="date" placeholder="Masukan Birth of date"
                                            value="{{ $user->date }}" class="form-control" aria-describedby="emailHelp">
                                        @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                                        <input type="text" name="phone" placeholder="Masukan phone Anda"
                                            value="{{ $user->phone }}" class="form-control" aria-describedby="emailHelp">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Gender</label>
                                        <select class="form-control form-control" id="defaultSelect" name="gender"
                                            aria-label="Default select example" required>
                                            <option value="{{ $user->gender }}" selected>
                                                @if ($user->gender == '1')
                                                    Male
                                                @elseif ($user->gender == '2')
                                                    Female
                                                @endif
                                            </option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Role</label>
                                        <select class="form-control form-control" id="defaultSelect" name="role"
                                            aria-label="Default select example" required>
                                            <option value="{{ $user->role }}" selected>
                                                @if ($user->role == '1')
                                                    Super Admin
                                                @elseif ($user->role == '2')
                                                    Admin
                                                @elseif ($user->role == '3')
                                                    Employe
                                                @endif
                                            </option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Employe</option>
                                        </select>
                                        @error('Role')
                                            <div class="alert alert-danger">{{ $message = 'Role harus di isi' }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Status</label>
                                        <select class="form-control form-control" id="defaultSelect" name="status"
                                            aria-label="Default select example" required>
                                            <option value="{{ $user->status }}" selected>
                                                @if ($user->status == '1')
                                                    Aktif
                                                @elseif ($user->status == '2')
                                                    Non Aktif
                                                @endif
                                            </option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Non Aktif</option>
                                        </select>
                                        @error('Role')
                                            <div class="alert alert-danger">{{ $message = 'Role harus di isi' }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Add similar rows for other form elements here -->

                                <button type="submit" class="btn form-control text-white"
                                    style="background-color: #B38B59">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    <div class="container">
        {{-- {{ $reservations->links() }} --}}
    </div>
@endsection
