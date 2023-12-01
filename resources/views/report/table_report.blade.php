{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> --}}
<table class="table table-responsive" id="data-table" style="zoom: 0.85;">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col" class="text-left">Name</th>
            <th scope="col" class="text-left">Email</th>
            <th scope="col">Guest</th>
            {{-- <th scope="col" class="text-center">Status Arriving</th> --}}
            <th scope="col">Reservation Table</th>
            <th scope="col" class="text-center">Payment</th>
            <th scope="col" class="text-center">Status Reservation</th>
            <th scope="col">Reservation Date</th>
            {{-- <th scope="col">Actions</th> --}}
        </tr>
    </thead>
    <tbody id="load_report_table">
        @php
            $counter = 1;
        @endphp
        @forelse ($reservations as $data)
            <tr>
                <td>{{ $counter++ }}</td>
                <td class="text-left">{{ $data->name }}</td>
                <td class="text-left">{{ $data->email }}</td>
                <td>{{ $data->guest }}</td>
                {{-- <td>
                    @if ($data->arriving == 0)
                        <div>
                            <div style="color:red">
                                Not Arrived
                            </div>
                        </div>
                    @else
                    <div>
                        <div>
                            <b>
                                Arrived
                            </b>
                        </div>
                    </div>
                    @endif
                </td> --}}
                <td>{{ $data->Tables->tables_name }} - {{ $data->Tables->table_guest }} people</td>
                <td class="text-center">
                    @if ($data->status == 'done')
                        <div class="badge badge-success text-center"
                            style="width: 100px; height: 30px; font-size: 16px;">
                            {{ $data->status }}
                        </div>
                    @else
                        <div class="badge rounded-pill bg-danger text-white"
                            style="width: 100px; height: 30px; font-size: 16px;">
                            {{ $data->status }}
                        </div>
                    @endif
                </td>

                <td class="text-center">
                    @if ($data->cancel == '1')
                        <div >
                            Coming
                        </div>
                    @else
                        <div style="color:red">
                            Canceled
                        </div>
                    @endif
                </td>
                <td>{{ $data->date->format('D d-M-Y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Data Empty</td>
            </tr>
        @endforelse
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "paging": true,
            "ordering": true,
            "lengthChange": false, // Hide the show entries dropdown
            "searching": false, // Hide the search box
            "pageLength": 25,

        });
    });
</script>
{{-- <div class="container">
    {{ $reservations->links() }}
</div> --}}
