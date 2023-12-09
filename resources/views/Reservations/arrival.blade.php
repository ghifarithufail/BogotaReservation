@extends('layout.default')
@section('contents')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="text-center">Arrival Guest</h1>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="form-group row ml-3">
                        {{-- <div class="col-sm-2">
                        <label class="control-label p-2">Name:</label>
                    </div> --}}
                        <div class="col-sm-4">
                            <input type="text" style="height: 40px" class="form-control" placeholder="Name" name="search"
                                id="search">
                        </div>
                        <div class="col-sm-4">
                            <select type="text" style="height: 40px" class="form-control"
                                placeholder="tables" name="tables" id="tables">
                                <option value="">-- Table --</option>
                                @foreach ($table as $data)
                                    <option value="{{ $data->tables_name }}" @if (request()->tables == $data->tables_name)selected @endif>{{ $data->tables_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn rounded text-white"
                                style="background-color: #D9B282; height: 40px;">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card text-center">
            <div class="card-body shadow">
                <table class="table" id="data-table" style="zoom: 0.85;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" class="text-left">Name</th>
                            <th scope="col" class="text-left">Email</th>
                            <th scope="col">Guest</th>
                            <th scope="col">Reservation Table</th>
                            <th scope="col">Reservation Date</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col">Arrival</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse  ($reservations as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td class="text-left">{{ $data->name }}</td>
                                <td class="text-left">{{ $data->email }}</td>
                                <td>{{ $data->guest }}</td>
                                <td>{{ $data->Tables->tables_name }} - {{ $data->Tables->table_guest }} people</td>
                                <td>{{ $data->date->format('D d-M-Y') }}</td>
                                <td class="text-center">
                                    @if ($data->status == 'done')
                                        <div class="badge badge-success text-center"
                                            style="width: 100px; height: 30px; font-size: 16px;">
                                            PAID
                                        </div>
                                    @else
                                        <div class="badge rounded-pill bg-danger text-white"
                                            style="width: 100px; height: 30px; font-size: 16px;">
                                            {{ $data->status }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($data->arriving == "0")
                                    <form action="{{ route('update.reservation.arrival', ['id' => $data->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn text-white" style="background-color: #D9B282 !important; border-radius: 10px;">
                                            <i class="fa fa-user-plus"></i>
                                        </button>
                                    </form>
                                    @else
                                        Customer has Arrived
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        {{ $reservations->links() }}
    </div>
@endsection
