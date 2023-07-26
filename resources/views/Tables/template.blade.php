@extends('layout.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('atlantis-lite-master\back/css/home.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="card">
        <div class="kontaner ml-3">

            <div class="judul text-center">
                <h1 class="text-center mb-4 mt-5 text-bold"> DATA PDF KOORDINATOR DESA</h1>
            </div>
            <div class="card-body mt-2">

                <form action="/pdf-kordes-detail" method="POST" target="__blank">
                    @csrf
                    <button class="btn btn-danger" style="width: 110px"><i class="fas fa-file mr-1"></i> PDF</button>
                </form>
                <div class="row g-3 align-items-center mt-2">
                    <div class="col-auto">

                    </div>
                </div>

                <table class="table table-hover" width="100%">
                    <div class="input-group">
                        <form action="/pdf-kordes-detail" method="POST" target="__blank">
                            @csrf
                            <input type="search" id="inputPassword6"
                                placeholder="Cari Koordinator Desa Dengan ID Koordinator Desa" name="search"
                                class="form-control mt-3" aria-describedby="passwordHelpInline">
                        </form>
                    </div>
                    <div class="row">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Koordinator Desa</th>
                                <th scope="col">Kelurahan/Desa</th>
                                <th scope="col">TPS</th>
                                <th scope="col">Relawan</th>
                                <th scope="col">Balad Husein</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
            </div>
        </div>
    @endsection
