@extends('layout.default')
@section('contents')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="text-center">User</h1>
            </div>
            {{-- <form action="">
                <div class="card-body">
                    <div class="form-group row ml-3">
                        <div class="col-sm-3">
                            <input type="text" style="height: 40px" class="form-control" placeholder="Name" name="search"
                                id="search">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" style="height: 40px" class="form-control" placeholder="Name"
                                name="date" id="date">
                        </div>
                        <div class="col-sm-2">
                            <select type="text" style="height: 40px" class="form-control"
                                placeholder="tables" name="tables" id="tables">
                                <option value="">-- Table --</option>
                                @foreach ($table as $data)
                                    <option value="{{ $data->tables_name }}" @if (request()->tables == $data->tables_name)selected @endif>{{ $data->tables_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-2">
                            <select name="payment" style="height: 40px" id="payment" class="form-control">
                                <option value="">-- Status --</option>
                                <option value="done" @if (request()->payment == 'done') selected @endif>Done</option>
                                <option value="unpaid" @if (request()->payment == 'unpaid') selected @endif>Unpaid</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn rounded text-white"
                                style="background-color: #D9B282; height: 40px;">Search</button>
                        </div>
                    </div>
                </div>
            </form> --}}
        </div>
        <div class="card text-center">
            <div class="card-body shadow">
                <div class="d-flex justify-content-end mb-3" style="zoom: 0.85;">
                    <a href="{{ route('user/create') }}">
                        <button type="button" class="btn btn-success rounded">Add +</button>
                    </a>
                </div>
                <table class="table" id="data-table" style="zoom: 0.8;">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-left">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Birth of date</th>
                            <th scope="col" class="text-center">Role</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $startingRow = ($user->currentPage() - 1) * $user->perPage() + 1;
                    @endphp
                        @foreach ($user as $data)
                        <tr>
                            <td>{{$startingRow ++}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->gender}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->date}}</td>
                            <td>
                                @if ($data->role == '1')
                                    Admin
                                @elseif ($data->role == '2')
                                    Employee
                                @endif
                            </td>
                            <td>
                                @if ($data->status == '1')
                                    Aktif
                                @elseif ($data->status == '2')
                                    Non Aktif
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user/edit', $data->id) }}" class="btn btn-warning edit m-1"
                                    style="width: 90px">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        {{ $user->links() }}
    </div>
@endsection
