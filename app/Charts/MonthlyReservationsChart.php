<?php

namespace App\Charts;

use App\Models\Reservation;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class MonthlyReservationsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');

        for ($i = 1; $i <= $bulan; $i++) {
            $sukses = Reservation::where('status','done')->where('cancel','0')->whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i) // Use $i instead of $bulan
                ->count();

            $gagal = Reservation::where('cancel','1')->whereYear('created_at', $tahun)
                ->whereMonth('created_at', $i) // Use $i instead of $bulan
                ->count();

            $user = User::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $i) // Use $i instead of $bulan
            ->count();

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $suksesReservation[] = $sukses;
            $gagalReservation[] = $gagal;
            // $dataUser[] = $user;
        }

        return $this->chart->lineChart()
            ->setTitle('Data Reservation')
            ->setSubtitle('Report per Month')
            ->addData('Success Reservation', $suksesReservation)
            ->addData('Failed Reservation', $gagalReservation)
            // ->addData('Employee', $dataUser)
            ->setHeight(250)
            ->setXAxis($dataBulan)
            ->setGrid()
            ->setColors(['#00FF00','#FF1414'])
            ->setMarkers(['#FF5722', '#E040FB'], 7, 10);
    }
}
