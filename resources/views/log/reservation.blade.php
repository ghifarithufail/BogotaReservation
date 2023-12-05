@extends('layout.default')
@section('contents')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="text-center">Log Reservation</h1>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group row ml-3">
                        <div class="col-sm-3">
                            <input type="text" style="height: 40px" class="form-control" placeholder="Name" name="search"
                                id="search">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" style="height: 40px" class="form-control" placeholder="Name"
                            value="{{ $request['date_start'] }}" name="date_start"  id="date_start">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" style="height: 40px" class="form-control" placeholder="Name"
                                value="{{ $request['date_end'] }}" name="date_end" id="date_end">
                        </div>  
                        <div class="col-sm-1">
                            <button type="submit" class="btn rounded text-white"
                                style="background-color: #D9B282; height: 40px;">Search</button>
                        </div>
                    </div>  
                </div>
            </form>
        </div>
        <div class="card text-center">
            <div class="card-body shadow">
                {{-- <div class="d-flex justify-content-end mb-3" style="zoom: 0.85;">
                    <a href="{{ route('user/create') }}">
                        <button type="button" class="btn btn-success rounded">Add +</button>
                    </a>
                </div> --}}
                <table class="table" id="data-table" style="zoom: 0.8;">
                    <thead>
                        <tr class="text-left">
                            <th scope="col">NO</th>
                            <th scope="col">User</th>
                            <th scope="col" class="text-left">Action</th>
                            <th scope="col">Log</th>
                            <th scope="col">Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $startingRow = ($logReservation->currentPage() - 1) * $logReservation->perPage() + 1;
                        @endphp
                        @foreach ($logReservation as $data)
                            <tr class="text-left">
                                <td>{{ $startingRow++ }}</td>
                                <td>{{ $data->users->name }}</td>
                                <td>{{ $data->action }}</td>
                                <td>{{ $data->doing }}</td>
                                <td>{{ $data->created_at->format('d-m-y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        {{ $logReservation->links() }}
    </div>
@endsection
