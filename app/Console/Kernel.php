<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Budget;
use App\Models\User;



class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
 
    protected function schedule(Schedule $schedule): void
    {
              //If current user has budgets notification enabled
              // Check if the user has budgets and if notifications are enabled
            $users = User::where('receive_notifications', true)->get();
              // Log the budget check
            \Log::info('Budget check started');
            
            foreach($users as $user){
              $schedule->call(function () use ($user){
                \Log::info("Budget check started for user ID: {$user->id}");
                $budgets = Budget::where('user_id', $user->id)->get();
              foreach($budgets as $budget) {
                $budget->checkSpending();
              }
              })->dailyAt($user->send_notification_time);        
            }
              
       
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
