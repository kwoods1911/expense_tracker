<?php

namespace App\Models;

use App\Notifications\BudgetThresholdExceeded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'category', 'notification_threshold'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'user_id', 'user_id');
    }

    public function checkSpending()
    { 
        $totalSpent = $this->expenses()->sum('amount');
        $threshouldAmount = $this->notification_threshold / 100 * $this->amount;

        if($totalSpent > $threshouldAmount) {
            $this->user->notify(new BudgetThresholdExceeded($this, $totalSpent));
        }
    }
}

