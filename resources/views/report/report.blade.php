{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

@extends('layout.default')
@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h1 class="text-center">Reservations Report</h1>
            </div>
            <form>
                <div class="card-body">
                    <div style="display: flex; flex-direction: column;">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="date1">Name:</label>
                                <input type="text" style="height: 40px" class="form-control" placeholder="Name"
                                    name="search" id="search">
                            </div>

                            <div class="col-sm-4">
                                <label for="date1">Tables:</label>
                                <select type="text" style="height: 40px" class="form-control" placeholder="tables"
                                    name="tables" id="tables">
                                    <option value="">-- Table --</option>
                                    @foreach ($table as $data)
                                        <option value="{{ $data->tables_name }}"
                                            @if (request()->tables == $data->tables_name) selected @endif>
                                            {{ $data->tables_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="date1">Status:</label>
                                <select name="payment" style="height: 40px" id="payment" class="form-control">
                                    <option value="">-- Status --</option>
                                    <option value="done" @if (request()->payment == 'done') selected @endif>Done</option>
                                    <option value="unpaid" @if (request()->payment == 'unpaid') selected @endif>Unpaid</option>
                                </select>
                            </div>
                            

                            <div class="col-sm-4 mt-3 d-flex justify-content-center flex-column">
                                <label for="date1">Start Date:</label>
                                <input type="date" style="height: 40px" class="form-control" name="date_start"
                                    id="date_start">
                            </div>

                            <div class="col-sm-4 mt-3 d-flex justify-content-center flex-column">
                                <label for="date1">End Date:</label>
                                <input type="date" style="height: 40px" class="form-control" name="date_end"
                                    id="date_end">
                            </div>

                            <div class="col-sm-4 mt-3 d-flex justify-content-center flex-column">
                                <label for="date1">Arrival:</label>
                                <select name="arrival" style="height: 40px" id="arrival" class="form-control">
                                    <option value="">-- Status --</option>
                                    <option value="1" @if (request()->payment == '1') selected @endif>Arrived</option>
                                    <option value="0" @if (request()->payment == '0') selected @endif>Not Arrived</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn rounded text-white" id="search_btn"
                            style="background-color: #D9B282; margin-right: 5px">Search</button>
                        <button type="button" class="btn btn-warning rounded text-white" id="reset_btn"
                            style="background-color: #d9d682; margin-left: 20px">Reset</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Customer Success</h1>
                    </div>
                    <div class="col-xs-12 col-sm-12 mt-3" id="report_sukses">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Tables</th>
                                    <th class="text-center">Customer</th>
                                    <th class="text-center">Arrival</th>
                                    <th class="text-center">Payment</th>
                                </tr>
                            </thead>
                            <tbody id="load_report_sukses">
                                <td colspan="4" class="text-center">
                                    <i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Customer Cancel</h1>
                    </div>
                    <div class="col-xs-12 col-sm-12 mt-3" id="report_gagal">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Tables</th>
                                    <th class="text-center">Customer</th>
                                    {{-- <th class="text-center">Not Arrival</th>
                                    <th class="text-center">Cenceled</th>
                                    <th class="text-center">Payment</th> --}}
                                </tr>
                            </thead>
                            <tbody id="load_report_gagal">
                                <td colspan="4" class="text-center">
                                    <i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i>
                                </td>
                                {{-- @php
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
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card text-center">
            <div class="card-body shadow">
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-success" id="download_data">Download</button>
                    {{-- <a href="/reservation/download" class="btn btn-success">Excel</a> --}}
                </div>
                <div id="report_table">
                    <table class="table" id="data-table" style="zoom: 0.85;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" class="text-left">Name</th>
                                <th scope="col" class="text-left">Email</th>
                                <th scope="col">Guest</th>
                                <th scope="col" class="text-center">Arrive</th>
                                <th scope="col">Reservation Table</th>
                                <th scope="col" class="text-center">Payment</th>
                                <th scope="col" class="text-center">Cancel</th>
                                <th scope="col">Reservation Date</th>
                                {{-- <th scope="col">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody id="load_report_table">
                            <tr>
                                <td colspan="8">
                                    <i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        {{ $reservations->links() }}
    </div> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                getTable();
                getSukses();
                getGagal();
                $("#filterForm").submit(function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    handleFilter();
                });
            }, 800);

            $("#reset_btn").click(function(e) {
                e.preventDefault();
                handleReset();
            });

            // Call the function to update the form fields when the page loads
            updateFormFieldsFromUrl();

            // Handle the download action
            $("#download_data").click(function(e) {
                e.preventDefault();
                handleFilter(); // Call the filter function to get the updated filter values
                var customer = $('input[name="search"]').val();
                var tanggal = $('input[name="date"]').val();
                var startDate = $('input[name="date_start"]').val();
                var endDate = $('input[name="date_end"]').val();
                var tables = $('#tables').val();
                var payment = $('#payment').val();
                var url = '/reservation/download';
                url = url + '?search=' + customer + '&date_start=' + startDate + '&date_end=' + endDate +
                    '&tables=' + tables +
                    '&payment=' + payment;

                // Use the Helper object to perform the download
                Helper.redirectTo(url);
            });
        });

        function getSukses() {
            axios.post('/report_sukses', {
                search: $('#search').val(),
                date_start: $('#date_start').val(),
                date_end: $('#date_end').val(),
                tables: $('select[name="tables"]').val(),
                payment: $('select[name="payment"]').val(),
            }).then(function(response) {
                $('#report_sukses').html(response.data);
            }).catch(function(error) {
                Helper.handleErrorResponse(error);
            });
        }

        function getTable() {
            axios.post('/report_table', {
                search: $('#search').val(),
                date_start: $('#date_start').val(),
                date_end: $('#date_end').val(),
                tables: $('select[name="tables"]').val(),
                payment: $('select[name="payment"]').val(),
            }).then(function(response) {
                $('#report_table').html(response.data);
            }).catch(function(error) {
                Helper.handleErrorResponse(error);
            });
        }

        function getGagal() {
            axios.post('/report_gagal', {
                search: $('#search').val(),
                date_start: $('#date_start').val(),
                date_end: $('#date_end').val(),
                tables: $('select[name="tables"]').val(),
                payment: $('select[name="payment"]').val(),
            }).then(function(response) {
                $('#report_gagal').html(response.data);
            }).catch(function(error) {
                Helper.handleErrorResponse(error);
            });
        }

        // Define the Helper object
        var Helper = {
            redirectTo: function(url) {
                window.location.href = url;
            }
        };

        // Function to update the form fields with the URL parameters
        function updateFormFieldsFromUrl() {
            var urlParams = new URLSearchParams(window.location.search);
            $('#search').val(urlParams.get('search'));
            $('#date').val(urlParams.get('date'));
            $('#tables').val(urlParams.get('tables'));
            $('#payment').val(urlParams.get('payment'));
            $('#date_start').val(urlParams.get('date_start'));
            $('#date_end').val(urlParams.get('date_end'));
        }

        function handleReset() {
            $('#search').val('');
            $('input[type="date"][name="date"]').val('');
            $('input[type="date"][name="date_start"]').val('');
            $('input[type="date"][name="date_end"]').val('');
            $('#tables').val('');
            $('#payment').val('');
            // After resetting the form fields, you can trigger the filter action to reload the data without the filters
            handleFilter();
        }

        function handleFilter() {
    var customer = $('input[name="search"]').val();
    var tables = $('#tables').val();
    var payment = $('#payment').val();
    var startDate = $('input[name="date_start"]').val();
    var endDate = $('input[name="date_end"]').val();

    // If startDate is empty, set it to the default value
    if (startDate == null) {
        startDate = '2020-01-01';
    }

    // If endDate is empty, set it to the current date
    if (endDate == null) {
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth() + 1; // Months are 0-indexed
        var year = today.getFullYear();
        endDate = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
    }

    console.log(customer);
    
    // Construct the URL with parameters
    var url = '/reservation/download' +
        '?search=' + customer +
        '&tables=' + tables +
        '&payment=' + payment +
        '&date_start=' + startDate +
        '&date_end=' + endDate;

    // Use AJAX to load the filtered data without reloading the page
    $.ajax({
        type: "GET",
        url: url,
        success: function(data) {
            // Process the returned data and update the relevant parts of your page
            console.log("Filtered data:", data);
            // For example, you can update the summary tables or the main data table
            // with the filtered results returned from the server
        },
        error: function(xhr, status, error) {
            // Handle any errors if necessary
            console.log("Error:", error);
        }
    });
}
    </script>
@endsection
