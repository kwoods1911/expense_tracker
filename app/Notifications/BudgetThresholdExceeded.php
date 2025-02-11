<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BudgetThresholdExceeded extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $budget;
    protected $totalSpent;

    public function __construct($budget, $totalSpent)
    {
        $this->budget = $budget;
        $this->totalSpent = $totalSpent;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Budget Alert: Spending Threshold Exceeded')
            ->line("You have exceeded {$this->budget->notification_threshold}% of your budget.")
            ->line("Total Spent: $" . number_format($this->totalSpent, 2))
            ->line("Total Budget: $" . number_format($this->budget->amount, 2))
            ->action('Review Expenses', url('/expenses'))
            ->line('Consider adjusting your spending to stay within budget.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
