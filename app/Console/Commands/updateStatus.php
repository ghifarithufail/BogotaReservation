<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;

class updateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:updateStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Customer status update';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $allResev = Reservation::where('status', 'unpaid')->get();

        foreach ($allResev as $data){
            if($currentDate > $data->created_at){
                $data->update(['cancel' => '1']);
            }
        }
    }
}
