<?php

namespace App\Http\Controllers;

use App\Events\NotifReservation;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservations = Reservation::with('Tables')->OrderBy('created_at', 'desc');

        $datas = Reservation::sum('guest');

        if ($request->has('search')) {
            $search = $request->search;
            $reservations = $reservations->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere(function ($query) use ($search) {
                        $query->whereHas('Tables', function ($Tables) use ($search) {
                            $Tables->where('name', 'like', '%' . $search . '%');
                        });
                    });
            });
        }

        if ($request->has('tables')) {
            $tables = $request->tables;
            $reservations = $reservations->whereHas('Tables', function ($query) use ($tables) {
                $query->where('name', 'like', '%' . $tables . '%');
            });
        }

        if ($request->has('date')) {
            $date = $request->date;
            $reservations = $reservations->where('date', 'like', '%' . $date . '%');
        }

        if ($request->has('payment')) {
            $payment = $request->payment;
            $reservations = $reservations->where('status', 'like', '%' . $payment . '%');
        }

        $reservations = $reservations->paginate(5);

        if ($request->has('search')) {
            $reservations->appends(['search' => $search]);
        }
        if ($request->has('tables')) {
            $reservations->appends(['tables' => $tables]);
        }
        if ($request->has('date')) {
            $reservations->appends(['date' => $date]);
        }
        if ($request->has('payment')) {
            $reservations->appends(['payment' => $payment]);
        }

        return view('Reservations.index', compact('reservations', 'datas'));
    }

    public function notif()
    {
        event(new NotifReservation("test notifications"));
    }

    public function update($id)
    {
        $reservations = Reservation::find($id);
        $tables       = Table::all();

        return view('Reservations.update', compact('reservations', 'tables'));
    }

    public function post(Request $request, $id)
    {
        $reservations = Reservation::findOrFail($id);
        $limit = Table::sum('table_guest');

        $date = $request->input('date');
        $table = Table::findOrFail($request->table_id);
        $recordCount = Reservation::whereDate('date', $date)->sum('guest');

        //Validation of reservation
        $reservationDate = Carbon::parse($reservations->date);
        $currentDate = Carbon::now();
        $daysDifference = $currentDate->diffInDays($reservationDate);

        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->whereDate('date', $date)
            ->first();

        if ($recordCount + $request->guest > $limit) {
            return back()->with('limit', 'You have reached the maximum limit of records for today.');
        }

        if ($daysDifference < 2) {
            return back()->with('dateReservation', 'Cannot update reservation within 2 days of the reservation date.');
        }

        if ($existingReservation) {
            return back()->with('warning', 'This table is already reserved.');
        }

        if ($request->guest > $table->table_guest) {
            return back()->with('guest', 'please choose the table base on guest.');
        }

        $name = $request->input('name');
        $guest = $request->input('guest');
        $date = $request->input('date');
        $table_id = $request->input('table_id');

        $data = [
            'name' => $name,
            'guest' => $guest,
            'table_id' => $table_id
        ];


        if (!is_null($date)) {
            $data['date'] = $date;
        }

        $reservations->update($data);

        return redirect()->route('reservations');
    }

    public function create()
    {
        $table = Table::all();

        $limit = Table::sum('table_guest');
        // $limit = Table::sum('table_guest');

        // dd($limit);

        return view('Reservations.create', compact('table', 'limit'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'guest'   => 'required',
            'date'   => 'required',
            'table_id'   => 'required',

            // 'tanggal' =>  'unique:events,date,NULL,id,time,' . $request->input('tanggal')
        ], [
            'date.required' => 'tanggal harus diisi.',
        ]);

        $date = $request->input('date');
        $limit = Table::sum('table_guest');
        $minimumDate = Carbon::now()->addDays(2)->startOfDay();
        $recordCount = Reservation::whereDate('date', $date)->sum('guest');
        $table = Table::findOrFail($request->table_id);

        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->whereDate('date', $date)
            ->first();

        if ($existingReservation) {
            return back()->with('warning', 'This table is already reserved.');
        }

        if ($request->guest > $table->table_guest) {
            return back()->with('guest', 'please choose the table base on guest.');
        }

        if (Carbon::parse($date)->isBefore($minimumDate)) {
            return back()->with('date', 'Minimum reservation is 2 days in advance');
        }

        // Check if the count exceeds the limit of 10
        if ($recordCount + $request->guest > $limit) {
            return back()->with('date', 'You have reached the maximum limit of records for today.');
        }

        $reservasi = Reservation::create($request->all());

        $dataSend = [
            'name' => $reservasi->name,
            'date' => $reservasi->date->format('D, d/m/Y'),
        ];

        event(new NotifReservation($dataSend));

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-474-cvbPRecHyCZZbYja0E-C';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $reservasi->id,
                'gross_amount' => 500000,
            ),
            'item_details' => [
                [
                    'id' => 2,
                    'price' => '350000',
                    'quantity' => 1,
                    'name' => $reservasi->date->format('D d/M/Y') . ', ' .
                        $reservasi->name,
                    'date' => $reservasi->date,
                ],
            ],
            'customer_details' => [
                [
                    'name'     => $reservasi->name,
                    'email'    => $reservasi->email,
                    'guest'    => $reservasi->guest,
                    'date'     => $reservasi->date,
                    'table_id' => $reservasi->table_id,
                ],
            ],
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // dd($snapToken);
        // return redirect()->route('reservations.create')->with('success', 'Reservation created successfully.');
        return view('Reservations.checkout', compact('snapToken', 'reservasi'));
    }

    function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                $reservasi = Reservation::find($request->order_id);
                $reservasi->update(['status' => 'done']);
            }
        }
    }

    // function finish(Request $request)
    // {
    //     $serverKey = config('midtrans.server_key');
    //     $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    //     if ($hashed == $request->signature_key) {
    //         if ($request->transaction_status == 'capture') {
    //             $reservasi = Reservation::find($request->order_id);
    //             $reservasi->update(['status' => 'paid']);
    //         }
    //     }
    // }

    function invoice($id)
    {
        $reservasi = Reservation::find($id);
        return view('Reservations.invoice', compact('reservasi'));
    }
}
