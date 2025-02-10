<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $transaction = $user->transactions()->create([
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        // Update total spending
        $user->total_spent += $transaction->amount;
        $user->save();

        // Check if spending exceeds the threshold
        if ($user->monthly_budget && $user->total_spent >= ($user->monthly_budget * ($user->notification_threshold / 100))) {
            if ($user->notification_type === 'email') {
                Mail::to($user->email)->send(new \App\Mail\BudgetAlert($user));
            } elseif ($user->notification_type === 'sms') {
                // Implement SMS sending here (e.g., Twilio API)
            }
        }

        return redirect()->back()->with('success', 'Transaction added!');
    }
}
