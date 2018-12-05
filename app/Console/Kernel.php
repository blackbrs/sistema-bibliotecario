<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use \Illuminate\Support\Facades\DB;
use DateTime;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {
           $pres = DB::table('prestamos')->where('prestamoActivo',TRUE)->get();
           $hoy = new DateTime();
           foreach($pres as $prestamo){

                $dia_prestamo = new DateTime($prestamo->created_at);
                $interval = $hoy->diff($dia_prestamo);
                $dias = $interval->format('%a');
                if($dias==0){$dias=1;}
                $prestamo->diasPrestado = $dias;
                $prestamo->save();
           }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
