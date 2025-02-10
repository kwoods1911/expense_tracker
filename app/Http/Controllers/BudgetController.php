<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'monthly_budget' => $request->monthly_budget,
            'notification_threshold' => $request->notification_threshold,
            'notification_type' => $request->notification_type,
        ]);

        return redirect()->back()->with('success', 'Budget settings updated!');
    }
}
