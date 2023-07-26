@extends('layout.default')
@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="text-center">Reservations</h1>
            </div>
                <form action="">
                    <div class="card-body">
                        <div class="form-group row">
                            {{-- <div class="col-sm-2">
                        <label class="control-label p-2">Name:</label>
                    </div> --}}
                            <div class="col-sm-3">
                                <input type="text" style="height: 40px" class="form-control" placeholder="Name" name="search" id="search">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" style="height: 40px" class="form-control" placeholder="Name" name="date" id="date">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" style="height: 40px" class="form-control" placeholder="tables" name="tables"
                                    id="tables">
                            </div>
                            <div class="col-sm-3">
                                <select name="payment" style="height: 40px" id="payment" class="form-control">
                                    <option value="">-- Payment Status --</option>
                                    <option value="done">Done </option>
                                    <option value="unpaid"> Unpaid </option>
                                </select>
                                {{-- <input type="text" class="form-control" placeholder="Status payment" name="payment" id="payment"> --}}
                            </div>
                            <div>
                                <button type="submit" class="btn rounded text-white" style="background-color: #D9B282; height: 40px">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
        <div class="card text-center">
            <div class="card-body shadow">
                <table class="table table-responsive" id="data-table" style="zoom: 0.85;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" class="text-left">Name</th>
                            <th scope="col" class="text-left">Email</th>
                            <th scope="col">Guest</th>
                            <th scope="col">Reservation Table</th>
                            <th scope="col">Reservation Date</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td class="text-left">{{ $data->name }}</td>
                                <td class="text-left">{{ $data->email }}</td>
                                <td>{{ $data->guest }}</td>
                                <td>{{ $data->Tables->name }} - {{ $data->Tables->table_guest }} people</td>
                                <td>{{ $data->date->format('D d-M-Y') }}</td>
                                <td class="text-center">
                                    @if ($data->status == 'done')
                                        <div class="badge badge-success text-center"
                                            style="width: 100px; height: 30px; font-size: 16px;">
                                            {{ $data->status }}
                                        </div>
                                    @else
                                        <div class="badge rounded-pill bg-danger text-white"
                                            style="width: 100px; height: 30px; font-size: 16px;">
                                            {{ $data->status }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('reservations.update', $data->id) }}"
                                        class="btn btn-warning edit m-1" style="width: 90px">Edit</a>
                                    <a href="#" class="btn btn-danger delete m-1" data-id="{{ $data->id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        {{ $reservations->links() }}
    </div>
@endsection
