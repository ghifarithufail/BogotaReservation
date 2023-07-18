<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- Pusher --}}
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('7f841073cc0e87c6eb72', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
    {{-- EndPusher --}}
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
                            href="{{ route('reservations.create') }}">Reservation</a>
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
        <h1 class="text-center">Reservations</h1>
        <form action="">
            <div class="form-group row">
                {{-- <div class="col-sm-2">
                        <label class="control-label p-2">Name:</label>
                    </div> --}}
                <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="Name" name="search" id="search">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="tables" name="tables" id="tables">
                </div>
                <div class="col-sm-2">
                    <select name="payment" id="payment" class="form-control">
                        <option value="">-- Payment Status --</option>
                        <option value="done">Done </option>
                        <option value="unpaid"> Unpaid </option>
                    </select>
                    {{-- <input type="text" class="form-control" placeholder="Status payment" name="payment" id="payment"> --}}
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <table class="table" id="data-table" style="zoom: 0.8;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Guest</th>
                    <th scope="col">Reservation Table</th>
                    <th scope="col">Reservation Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->guest }}</td>
                        <td>{{ $data->Tables->name }} - {{ $data->Tables->table_guest }} people</td>
                        <td>{{ $data->date->format('D d-M-Y') }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <a href="{{ route('reservations.update', $data->id) }}"
                                class="btn btn-warning edit m-1">Edit</a>
                            {{-- <a href="#" class="btn btn-danger delete m-1" data-id="{{ $row->id }}"
                                data-calon="{{ $row->nama }}">Delete</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            contoh ini ada di branch pord
        </table>
    </div>
    asjfkbfk
    <div class="container">
        {{ $reservations->links() }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
