<table class="table" id="data-table" style="zoom: 0.85;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col" class="text-left">Name</th>
            <th scope="col" class="text-left">Email</th>
            <th scope="col">Guest</th>
            <th scope="col">Reservation Table</th>
            <th scope="col" class="text-center">Payment</th>
            <th scope="col" class="text-center">Status Reservation</th>
            <th scope="col">Reservation Date</th>
            <th scope="col">Created Date</th>
            <th scope="col">Price</th>
            {{-- <th scope="col">Actions</th> --}}
        </tr>
    </thead>
    <tbody>
        @forelse  ($query as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td class="text-left">{{ $data->name }}</td>
                <td class="text-left">{{ $data->email }}</td>
                <td>{{ $data->guest }}</td>
                <td>{{ $data->Tables->tables_name }} - {{ $data->Tables->table_guest }} people</td>
                <td class="text-center">
                    @if ($data->status == 'done')
                        <div class="badge badge-success text-center"
                            style="width: 100px; height: 30px; font-size: 16px;">
                            Paid
                        </div>
                    @else
                        <div class="badge rounded-pill bg-danger text-white"
                            style="width: 100px; height: 30px; font-size: 16px;">
                            {{ $data->status }}
                        </div>
                    @endif
                </td>
                <td>@if ($data->cancel == 1)
                    Canceled
                @else
                    Coming
                @endif
                </td>
                <td>{{ $data->date->format('D d-M-Y') }}</td>
                <td>{{ $data->created_at->format('D d-M-Y') }}</td>
                <td>{{ $data->price }}</td>
                {{-- <td>
                    <a href="{{ route('reservations.update', $data->id) }}"
                        class="btn btn-warning edit m-1" style="width: 90px">Edit</a>
                    <a href="#" class="btn btn-danger delete m-1"
                        data-id="{{ $data->id }}">Delete</a>
                </td> --}}
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Data Empty</td>
            </tr>
        @endforelse
    </tbody>
</table>