@extends('layout.default')
@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="text-center">Reservations Report</h1>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="form-group row ml-2">
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
                                <option value="done" @if(request()->payment == 'done') selected @endif>Done</option>
                                <option value="unpaid" @if(request()->payment == 'unpaid') selected @endif>Unpaid</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn rounded text-white"
                                style="background-color: #D9B282; height: 40px;">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Summary Success</h1>
                    </div>
                    <div class="col-xs-12 col-sm-12 mt-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Tables</th>
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Arrival</th>
                                    <th class="text-center">Payment</th>
                                </tr>
                            </thead>
                            <tbody id="load_summary_bnc">
                                @php
                                    $totalCustSum = 0;
                                    $totalArrive  = 0;
                                @endphp
                                @forelse ($report['sukses'] as $data)
                                @php
                                    $totalCustSum += $data->total;
                                    $totalArrive += $data->datang;
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $data->tables_name }}</td>
                                    <td class="text-right">{{ $data->total }}</td>
                                    <td class="text-right">{{ $data->datang }}</td>
                                </tr>
                                @Empty
                                <tr>
                                    <td colspan="8" class="text-center">Data Empty</td>
                                </tr>
                            @endforelse
                            <tfoot>
                                <th class="text-right">Grand Total : </th>
                                <th class="text-right bold">{{$totalCustSum}}</th>
                                <th class="text-right bold">{{$totalArrive}}</th>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Summary Failed</h1>
                    </div>
                    <div class="col-xs-12 col-sm-12 mt-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Tables</th>
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Not Arrival</th>
                                    <th class="text-center">Payment</th>
                                </tr>
                            </thead>
                            <tbody id="load_summary_bnc">
                                @php
                                    $totalCustSum = 0;
                                    $totalpre_arrival = 0;
                                @endphp
                                @forelse ($report['gagal'] as $data)
                                @php
                                    $totalCustSum += $data->total;
                                    $totalpre_arrival += $data->pre_arrival;
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $data->tables_name }}</td>
                                    <td class="text-right">{{ $data->total }}</td>
                                    <td class="text-right">{{ $data->pre_arrival }}</td>
                                </tr>
                                @Empty
                                <tr>
                                    <td colspan="8" class="text-center">Data Empty</td>
                                </tr>
                            @endforelse

                            <tfoot>
                                <th class="text-right">Grand Total : </th>
                                <th class="text-right">{{$totalCustSum}}</th>
                                <th class="text-right">{{$totalpre_arrival}}</th>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card text-center">
            <div class="card-body shadow">
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="btn btn-success">Excel</a>
                </div>
                <table class="table" id="data-table" style="zoom: 0.85;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" class="text-left">Name</th>
                            <th scope="col" class="text-left">Email</th>
                            <th scope="col">Guest</th>
                            <th scope="col">Reservation Table</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col">Reservation Date</th>
                            {{-- <th scope="col">Actions</th> --}}
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
                                <td>{{ $data->date->format('D d-M-Y') }}</td>
                                {{-- <td>
                                    <a href="{{ route('reservations.update', $data->id) }}"
                                        class="btn btn-warning edit m-1" style="width: 90px">Edit</a>
                                    <a href="#" class="btn btn-danger delete m-1"
                                        data-id="{{ $data->id }}">Delete</a>
                                </td> --}}
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
