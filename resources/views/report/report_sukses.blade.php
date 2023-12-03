<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">Tables</th>
                <th class="text-center">Customer</th>
                <th class="text-center">Arrival</th>
                {{-- <th class="text-center">Cancel</th> --}}
                <th class="text-center">Payment</th>
            </tr>
        </thead>
        <tbody id="load_report_sukses">
            @php
                $totalCustSum = 0;
                $totalArrive = 0;
                $totalCancel = 0;
                $totalPrice = 0;
            @endphp
            @forelse ($report['sukses'] as $data)
                @php
                    $totalCustSum += $data->total;
                    $totalArrive += $data->datang;
                    $totalCancel += $data->cancel;
                    $totalPrice += $data->total * 150000;
                @endphp
                <tr>
                    <td class="text-center">{{ $data->tables_name }}</td>
                    <td class="text-right">{{ $data->total }}</td>
                    <td class="text-right">{{ $data->datang }}</td>
                    {{-- <td class="text-right">{{ $data->cancel }}</td> --}}
                    <td class="text-right">{{ number_format($data->total * 150000) }}</td>
                </tr>
            @Empty
                <tr>
                    <td colspan="8" class="text-center">Data Empty</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <th class="text-right">Total : </th>
            <th class="text-right bold">{{ $totalCustSum }}</th>
            <th class="text-right bold">{{ $totalArrive }}</th>
            {{-- <th class="text-right bold">{{ $totalCancel }}</th> --}}
            <th class="text-right bold">{{ number_format($totalPrice) }}</th>
        </tfoot>
    </table>
</div>
