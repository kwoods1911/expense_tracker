<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'monthly_budget',
        'total_spent',
        'notification_threshold',
        'notification_type',
        'timezone',
        'receive_notifications',
        'send_notification_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function expenses()
    {
    return $this->hasMany(Expense::class);
    }

    public function getFormattedNotificationTimeAttribute()
    {
        
        return Carbon::parse($this->send_notification_time)
        ->setTimezone($this->timezone ?? config('app.timezone'))
        ->format('H:i');
    }

    public function getFormattedNotificationSelectionAttribute(){
        return ($this->receive_notifications) ? 'Yes' : 'No';
    }

    public function getFormattedUserTimezoneAttribute(){
        return ($this->timezone) ? $this->timezone : 'N/A';
    }

}
