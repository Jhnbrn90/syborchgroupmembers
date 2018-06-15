<?php

namespace App\Console;

use App\Mail\MachineIsRunning;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $schedule->call(function() {
            // find out if the SFMC is running
            $machine = \App\Status::where('machine', 'SFC-MS')->first();

            if($machine->status == "running") {
               // get the user's email
                $email = $machine->user->email;
                // send the e-mail
                Mail::to($email)->send(new MachineIsRunning());
            }

        })->hourly();
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
