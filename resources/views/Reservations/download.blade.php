<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Invoice
                <strong>{{$reservasi->created_at->format('D d-M-Y')}}</strong>
                <span class="float-right "> <strong>Status :</strong> {{strtoupper($reservasi->status)}}</span>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">To:</h6>
                        <div>
                            <strong>{{$reservasi->name}}</strong>
                        </div>
                        <div>{{$reservasi->email}}</div>
                        {{-- <div>71-101 Szczecin, Poland</div>
                        <div>Email: info@webz.com.pl</div>
                        <div>Phone: +48 444 666 3333</div> --}}
                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                {{-- <th>Item</th> --}}
                                <th>Description</th>
                                <th class="right">Price</th>
                                <th class="center">Guest</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center">1</td>
                                {{-- <td class="left strong">Origin License</td> --}}
                                <td class="left">Making Reservation in,
                                    {{$reservasi->date->format('D d-M-Y')}}
                                    <div>
                                        table {{$reservasi->Tables->tables_name}}, guest {{$reservasi->guest}} people and time {{$reservasi->time}}
                                    </div>
                                </td>

                                <td class="right">150.000</td>
                                <td class="center">{{$reservasi->guest}}</td>
                                <td class="right">{{number_format($reservasi->price)}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-right" colspan="4">
                                    <strong>Subtotal :</strong>
                                </td>
                                <td class="right">
                                    <strong>{{number_format($reservasi->price)}}</strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>
