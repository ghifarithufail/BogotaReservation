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
        $reservations = Reservation::with('Tables')->OrderBy('created_at', 'desc')->where('cancel',[1]);

        
        $today = Carbon::today();
        $datas = Reservation::sum('guest');
        $table = Table::orderBy('tables_name', 'asc')->get();
        
        $this->filter($request, $reservations);
        $reservations = $reservations->paginate(5);

        $reservations->appends($request->all());

        \Log::info($request);
        return view('Reservations.index', compact('reservations', 'datas', 'table'));
    }

    private function filter(Request $request, $query)
{
    if ($request->has('search')) {
        $search = $request->search;
        $query = $query->where('name', 'like', '%' . $search . '%');
    }

    if ($request->has('tables')) {
        $tables = $request->tables;
        $query = $query->whereHas('Tables', function ($q) use ($tables) {
            $q->where('tables_name', 'like', '%' . $tables . '%');
        });
    }


    if ($request->has('date_start')) {
        $dateStart = date('Y-m-d', strtotime($request->date_start));
        $query->whereDate('date', '>=', $dateStart);
    }
    
    if ($request->has('date_end')) {
        $dateEnd = date('Y-m-d', strtotime($request->date_end));
        $query->whereDate('date', '<=', $dateEnd);
    }

    if ($request->has('date')) {
        $date = $request->date;
        $query = $query->where('date', 'like', '%' . $date . '%');
    }

    if ($request->has('payment')) {
        $payment = $request->payment;
        $query = $query->where('status', 'like', '%' . $payment . '%');
    }

    return $query;
}

    public function arrival(Request $request)
    {
        $today = Carbon::today();
        $reservations = Reservation::with('Tables')->where('date', '>=', $today)->where('status', 'done')->OrderBy('name', 'asc');
        $this->filter($request, $reservations);

        $datas = Reservation::sum('guest');
        $table = Table::orderBy('tables_name', 'asc')->get();

        $reservations = $reservations->paginate(5);
        $reservations->appends($request->all());

        return view('Reservations.arrival', compact('reservations', 'datas', 'table'));
    }

    public function updateArriving($id)
    {
        // Find the reservation by ID
        $reservation = Reservation::with('Tables')->findOrFail($id);

        if ($reservation->arriving === '0') {
            // Update the status to "done"
            $reservation->arriving = '1';
            $reservation->save();

            return redirect()->route('reservations.arrival')
                ->with('success', 'Reservation marked as done successfully!');
        }
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

    public function cencel($id){
        $reservation = Reservation::findOrFail($id);
        
        $data = [
            'cancel' => 0
        ];

        $reservation->update($data);

        return redirect()->route('reservations');
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

        // code untuk mencari table yang terisi
        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->whereDate('date', $date)
            ->first();

        //validasi limit orang
        if ($recordCount + $request->guest > $limit) {
            return back()->with('limit', 'You have reached the maximum limit of records for today.');
        }

        //validasi bisa reservasi jika h-1
        if ($daysDifference < 1) {
            return back()->with('dateReservation', 'Cannot update reservation within 1 days of the reservation date.');
        }

        // validasi untuk table yang terisi
        if ($existingReservation) {
            return back()->with('warning', 'This table is already reserved.');
        }

        //validasi untuk tidak lebih dari limit table
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

    public function payment(Request $request)
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

        //memgambil tanggal
        $date = $request->input('date');

        //menghitung jumlah limit orang
        $limit = Table::sum('table_guest');

        //code minimum reservasi 1 hari sebelumnya
        $minimumDate = Carbon::now()->addDays(1)->startOfDay();

        //menghitung jumlah tamu
        $recordCount = Reservation::whereDate('date', $date)->sum('guest');

        $table = Table::findOrFail($request->table_id);

        //code untuk mencari table reservasi
        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->whereDate('date', $date)
            ->first();

        // validasi untuk table yang sudah di reservasi
        if ($existingReservation) {
            return back()->with('warning', 'This table is already reserved.');
        }

        // validasi memilih meja sesuai dengan kapasisatas ornag
        if ($request->guest > $table->table_guest) {
            return back()->with('guest', 'please choose the table base on guest.');
        }

        //validasi untuk minimum reservasi 2 hari sebelumnya
        if (Carbon::parse($date)->isBefore($minimumDate)) {
            return back()->with('date', 'Minimum reservation is 1 days in advance');
        }

        //validasi untuk limit reservasi 
        if ($recordCount + $request->guest > $limit) {
            return back()->with('date', 'You have reached the maximum limit of records for today.');
        }

        $reservasi = Reservation::create($request->all());

        $dataSend = [
            'name' => $reservasi->name,
            'date' => $reservasi->date->format('D, d/m/Y'),
        ];

        // event(new NotifReservation($dataSend));

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
