<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('reservations') }}">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tables') }}">Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservations') }}">Report</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">Update Reservations</h1>

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
        @if (session('guest'))
            <div class="alert alert-danger">
                {{ session('guest') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-danger">
                {{ session('warning') }}
            </div>
        @endif
        <form action="/reservation/{{ $reservations->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">name</label>
                <input type="text" class="form-control mb-2" name="name" value="{{ $reservations->name }}"
                    id="name" aria-describedby="emailHelp">
                @error('name')
                    <div class="alert alert-danger">{{ $pesan = 'Kolom name tidak boleh kosong' }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Table</label>
                <select name="table_id" id="kecamatan" data-width="100%"
                    class="js-example-basic-multiple js-states form-control" aria-label="Default select example">

                    <option value="{{ $reservations->table_id }}"> -- {{ $reservations->Tables->name }} ({{ $reservations->Tables->table_guest }} people) --
                    </option>
                    @foreach ($tables as $data)
                        <option value="{{ $data->id }}">{{ $data->name }} ({{ $data->table_guest }} people)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label ">guest</label>
                <input type="text" class="form-control mb-2" name="guest" value="{{ $reservations->guest }}"
                    value="{{ old('guest') }}" id="guest" aria-describedby="emailHelp">
                @error('guest')
                    <div class="alert alert-danger">{{ $pesan = 'Kolom bulan tidak boleh kosong' }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">date</label>
                <input type="date" class="form-control mb-2" value="{{ old('date') }}"
                    value="{{ $reservations->date }}" name="date" id="date">
                {{-- <input type="date" class="form-control mb-2" value="{{ old('date', $reservations->date->format('Y-m-d')) }}"  name="date"
                    id="date"> --}}
                <p>Current Reservation Date: {{ $reservations->date->format('D d-M-Y') }}</p>
                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if (session('update'))
                    <div class="alert alert-danger">
                        {{ session('update') }}
                    </div>
                @endif
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
