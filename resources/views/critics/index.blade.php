@extends('layout.default')
@section('contents')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="text-center">Critics</h1>
            </div>
            <form action="">
                <div class="card-body">
                    {{-- <div class="form-group row ml-3">
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
                    </div> --}}
                </div>
            </form>
        </div>
        <div class="card text-center">
            <div class="card-body shadow">
                <table class="table" id="data-table" style="zoom: 0.85;">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col" class="text-left">Name</th>
                            <th scope="col" class="text-left">Email</th>
                            <th scope="col" class="text-left">Critics</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $startingRow = ($critics->currentPage() - 1) * $critics->perPage() + 1;
                        @endphp
                        @forelse  ($critics as $data)
                            <tr>
                                <td>{{$startingRow ++}}</td>
                                <td class="text-left">{{ $data->name }}</td>
                                <td class="text-left">{{ $data->email }}</td>
                                <td class="text-left">{{ $data->critics }}</td>
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
    {{-- <div class="container">
        {{ $reservations->links() }}
    </div> --}}
@endsection
