@extends('layout.default')
@section('contents')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Update Reservations</h1>
            </div>
            <div class="card-body shadow">
                <div class="container">
                    <div class="row justify-content-center">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('limit'))
                            <div class="alert alert-danger">
                                {{ session('limit') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('dateReservation'))
                            <div class="alert alert-danger">
                                {{ session('dateReservation') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-danger">
                                {{ session('warning') }}
                            </div>
                        @endif
                        <div class="col-md-8">
                            <form action="/reservation/{{ $reservations->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 mt-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $reservations->name }}" id="name" aria-describedby="emailHelp">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $pesan = 'Kolom name tidak boleh kosong' }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Table</label>
                                        <select name="table_id" id="table_id" data-width="100%"
                                            class="js-example-basic-multiple js-states form-control"
                                            aria-label="Default select example">
                                            <option value="{{ $reservations->table_id }}"> --
                                                {{ $reservations->Tables->tables_name }}
                                                ({{ $reservations->Tables->table_guest }} people) --
                                            </option>
                                            @foreach ($tables as $data)
                                                <option value="{{ $data->id }}">{{ $data->tables_name }}
                                                    ({{ $data->table_guest }} people)
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Guest</label>
                                        <input type="text" class="form-control mb-2" name="guest"
                                            value="{{ $reservations->guest }}" value="{{ old('guest') }}" id="guest"
                                            aria-describedby="emailHelp">
                                        <div>
                                            @if (session('guest'))
                                                <div class="alert alert-danger">
                                                    {{ session('guest') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Date</label>
                                        <input type="date" class="form-control mb-2" name="date"
                                            value="{{ $reservations->date }}" id="date">
                                        <p>Current Reservation Date: {{ $reservations->date->format('D d-M-Y') }}</p>
                                        {{-- @if (session('dateReservation'))
                                            <div class="alert alert-danger">
                                                {{ session('dateReservation') }}
                                            </div>
                                        @endif --}}
                                        @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        @if (session('update'))
                                            <div class="alert alert-danger">
                                                {{ session('update') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Time</label>
                                        <select class="form-control form-control" id="defaultSelect" name="time"
                                            aria-label="Default select example" required>
                                            <option value="{{ $reservations->time }}" selected>
                                                @if ($reservations->time == '16.00 - 18.00')
                                                    == 16.00 - 18.00 ==
                                                @elseif ($reservations->time == '19.00 - 21.00')
                                                    == 19.00 - 21.00 ==
                                                @endif
                                            </option>
                                            <option value="16.00 - 18.00">16.00 - 18.00</option>
                                            <option value="19.00 - 21.00">19.00 - 21.00</option>
                                        </select>
                                        @if (session('time'))
                                        <div class="alert alert-danger">
                                            {{ session('time') }}
                                        </div>
                                    @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn form-control text-white"
                                    style="background-color: #B38B59">Submit</button>
                            </form>
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
