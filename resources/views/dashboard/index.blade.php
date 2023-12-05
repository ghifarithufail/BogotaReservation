@extends('layout.default')
@section('contents')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="text-center">Dashboard</h1>
            </div>
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-dark bg-primary-gradient">
                                <div class="card-body pb-0 kartu">
                                    <div class="h1 fw-bold float-right text-white">{{$user}}</div>
                                    <i class="fa fa-user fa-2x ml-1 text-white"></i>
                                    <h2 class="mt-2 sub-judul text-white">USER</h2>
                                    <div class="pull-in sparkline-fix chart-as-background">
                                        <div id="lineChart"><canvas width="327" height="70"
                                                style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-dark bg-success-gradient">
                                <div class="card-body pb-0 kartu">
                                    <div class="h1 fw-bold float-right text-white">{{$sukses}}</div>
                                    <i class="fa fa-user-plus fa-2x ml-1" aria-hidden="true"></i>
                                    <h2 class="mt-2 sub-judul text-white">Reservation Success</h2>
                                    <div class="pull-in sparkline-fix chart-as-background">
                                        <div id="lineChart"><canvas width="327" height="70"
                                                style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-dark bg-warning-gradient">
                                <div class="card-body pb-0 kartu">
                                    <div class="h1 fw-bold float-right text-white">{{number_format($price)}}</div>
                                    <i class="fa fa-credit-card fa-2x ml-1" aria-hidden="true"></i>
                                    <h2 class="mt-2 sub-judul text-white">Payment</h2>
                                    <div class="pull-in sparkline-fix chart-as-background">
                                        <div id="lineChart"><canvas width="327" height="70"
                                                style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-dark bg-danger-gradient">
                                <div class="card-body pb-0 kartu">
                                    <div class="h1 fw-bold float-right text-white">{{$gagal}}</div>
                                    <i class="fa fa-user-times fa-2x ml-1" aria-hidden="true"></i>
                                    <h2 class="mt-2 sub-judul text-white">Reservation Failed</h2>
                                    <div class="pull-in sparkline-fix chart-as-background">
                                        <div id="lineChart"><canvas width="327" height="70"
                                                style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container mt-4">
        <div class="card shadow">
                {{-- <div class="card-header">
                    <h1 class="text-center">Chart</h1>
                </div> --}}
            <form>
                <div class="card-body">
                {!! $chart->container() !!}
                </div>
            </form>
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}

@endsection
