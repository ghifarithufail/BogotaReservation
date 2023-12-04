@extends('layout.default')
@section('contents')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Table Create</h1>
            </div>
            <div class="card-body shadow">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="{{ route('table.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 mt-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Name Table</label>
                                        <input type="text" name="tables_name" placeholder="Masukan name Anda"
                                            class="form-control" aria-describedby="emailHelp">
                                        @error('tables_name')
                                            <div class="alert alert-danger mt-1" style="color: red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Guest</label>
                                        <input type="text" name="table_guest" placeholder="Masukan email"
                                            class="form-control" aria-describedby="emailHelp">
                                        @error('table_guest')
                                            <div class="alert alert-danger mt-1" style="color: red;">{{ $message }}</div>
                                        @enderror
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
    </div>
    <div class="container">
        {{-- {{ $reservations->links() }} --}}
    </div>
@endsection
