<?php

namespace App\Http\Controllers;

use App\Exports\ReservationExport;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;


class ReportController extends Controller
{
    public function report(Request $request)
    {
        $today = Carbon::today();
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth()->today();
        $table = Table::orderBy('tables_name', 'asc')->get();

        if(!$request['start']) $request['start'] = $start->format('Y-m-d');
        if(!$request['end']) $request['end'] = $end->format('Y-m-d');
        // $filter = $this->filter($request, $reservations);
        
        // \Log::info('Start Date: ' . $request['start']);
        // \Log::info('End Date: ' . $request['end']);

        return view('report.report', compact('table','request'));
    }

    public function index(){
        $users = Reservation::selectRaw('MONTH(date) as month, COUNT(*) as count')
                ->whereYear('date', date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get();
                
                $labels = [];
                $data = [];
                $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#795548', '#9C27B0', '#2196F3' ,'FF9800', '#CDDC39', '#607D8B'];
                
                for($i=1; $i <= 12; $i++){
                    $month = date('F',mktime(0,0,0,$i,1));
                    $count = [];
                    
                    foreach($users as $user){
                        if($user->month == $i){
                            array_push($data, $user->count);
                            // $count = $user->count();
                            // dd($users);
                            break;
                        }
                    }
                    
                    
                    array_push($labels, $month);
                    // array_push($data, $count);
                }
                
                $datasets = [
                    [
                'label' => 'Reservasi',
                'data' => $data,
                'backgroundColor' => $colors,
                
                ]
            ];
            \Log::info($users);
            return view('report.index',compact('datasets', 'labels','data','users'));
    }

    public function download(Request $request)
    {
        $tanggal = Carbon::today()->format('D d-M-Y');
        $filters = $request->all();
        $name    = 'Reservation '. $tanggal . '.xlsx';
        // dd($filters);
        return Excel::download(new ReservationExport($filters), $name);
    }

    public function report_table(Request $request){
        $reservations = Reservation::with('tables')->orderBy('created_at', 'desc');


        $reservations = $this->filter($request, $reservations)->get();

        // $reservations->appends($request->all());
        return view('report.table_report', compact('reservations'));

    }

    public function report_success(Request $request){
        $report['sukses'] = Reservation::with('Tables')
        ->where('status', 'done')
        ->selectRaw('sum(guest) as total, count(CASE WHEN arriving = "1" THEN 1 ELSE NULL END) as datang, tables.tables_name')
        ->join('tables', 'reservations.table_id', '=', 'tables.id')
        ->groupBy('tables.tables_name')
        ->orderBy('tables.tables_name', 'asc');

        $report['sukses'] = $this->filter($request, $report['sukses'])->get();

        return view('report.report_sukses', compact('report'));
    }

    public function report_failed(Request $request){
        $report['gagal'] = Reservation::with('Tables')
            ->where('status', 'unpaid')
            ->selectRaw('sum(guest) as total, count(CASE WHEN arriving = "0" THEN 1 ELSE NULL END) as pre_arrival, tables.tables_name')
            ->join('tables', 'reservations.table_id', '=', 'tables.id')
            ->groupBy('tables.tables_name')
            ->orderBy('tables.tables_name', 'asc');

        $report['gagal'] = $this->filter($request, $report['gagal'])->get();

        return view('report.report_gagal', compact('report'));
    }

    private function filter(Request $request, $query)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $query = $query->where('name', 'like', '%' . $search . '%');
        }
    
        if ($request->has('tables')) {
            $tables = $request->tables;
            $query = $query->whereHas('tables', function ($q) use ($tables) {
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
}
