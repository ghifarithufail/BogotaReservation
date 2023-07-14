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
        <h1 class="text-center">Detail Reservasi</h1>
        <div class="card" style="width: 20rem;">
            <h5 class="card-title text-center">Detail Reservasi</h5>
            <div class="card-body">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $reservasi->name }} </td>
                    </tr>
                    <tr>
                        <td>Reservation</td>
                        <td>: {{ $reservasi->date->format('D d-M-Y') }} </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>: {{ $reservasi->guest }} Orang</td>
                    </tr>
                    <tr>
                        <td>Table</td>
                        <td>: {{ $reservasi->Tables->name }} </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{ $reservasi->status }} </td>
                    </tr>
                </table>
            </div>
            <div class="text-center mb-3">
                <button type="submit" id="pay-button" class="btn btn-warning text-center"
                    style="width: 18rem">Download</button>
            </div>
        </div>
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
