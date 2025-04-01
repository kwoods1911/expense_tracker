<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Budget;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

      //If current user has budgets notification enabled
       $schedule->call(function(){
            \Log::info('Budget check started');
              $budgets = Budget::all();
              foreach($budgets as $budget) {
                $budget->checkSpending();
              }        
       })->dailyAt('08:00'); // Adjust the time as needed
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
