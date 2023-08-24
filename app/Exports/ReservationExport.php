<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Reservation;

class ReservationExport implements FromView
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function view(): View
    {
        $filters = $this->filters;

        $query = Reservation::with('tables')->orderBy('created_at', 'desc');

        if ($filters['search']) {
            $query = $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
    
        if ($filters['tables']) {
            $query = $query->whereHas('tables', function ($q) use($filters) {
                $q->where('tables_name', 'like', '%' . $filters['tables'] . '%');
            });
        }

        if ($filters['date_start']) {
            // $dateStart = date('Y-m-d', strtotime($filters->date_start));
            $query->whereDate('date', '>=', $filters['date_start']);
        }
        
        if ($filters['date_end']) {
            // $dateEnd = date('Y-m-d', strtotime($filters->date_end));
            $query->whereDate('date', '<=', $filters['date_end']);
        }
    
        // if ($filters['date']) {
        //     $query = $query->where('date', 'like', '%' . $filters['date'] . '%');
        // }
    
        if ($filters['payment']) {
            $query = $query->where('status', 'like', '%' . $filters['payment'] . '%');
        }
        \Illuminate\Support\Facades\Log::debug($query->toSql(), $query->getBindings());

        return view('export.reservation.index', [
            'query' => $query->get(),
        ]);
    }
}

