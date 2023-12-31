<div class="table-responsive">
    <table class="table table-bordered table-striped ta">
        <thead>
            <tr>
                <th class="text-center">Tables</th>
                <th class="text-center">Reservation</th>
            </tr>
        </thead>
        <tbody id="load_report_gagal">
            @php
                $totalCustSum = 0;
                $totalpre_arrival = 0;
                $totalCancel = 0;
            @endphp
            @forelse ($report['gagal'] as $data)
                @php
                    $totalCustSum += $data->total;
                    $totalpre_arrival += $data->pre_arrival;
                    $totalCancel += $data->total;
                @endphp
                <tr>
                    <td class="text-center">{{ $data->tables_name }}</td>
                    {{-- <td class="text-right">{{ $data->total }}</td>
                <td class="text-right">{{ $data->pre_arrival }}</td> --}}
                    <td class="text-right">{{ $data->total }}</td>
                </tr>
            @Empty
                <tr>
                    <td colspan="8" class="text-center">Data Empty</td>
                </tr>
            @endforelse

        </tbody>
        <tfoot>
            <th class="text-right">Total : </th>
            {{-- <th class="text-right">{{ $totalCustSum }}</th>
        <th class="text-right">{{ $totalpre_arrival }}</th> --}}
            <th class="text-right">{{ $totalCancel }}</th>
        </tfoot>
    </table>
</div>
