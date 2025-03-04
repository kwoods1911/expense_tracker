<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Budget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Total budget and total spending
        $totalBudget = Budget::where('user_id', $user->id)->sum('amount');
        
        $totalSpent = Expense::where('user_id', $user->id)->sum('amount');

        // Spending by category
        $spendingByCategory = Expense::where('user_id', $user->id)
            ->selectRaw('category, SUM(amount) as total_spent')
            ->groupBy('category')
            ->pluck('total_spent', 'category');

        // Recent expenses
        $recentExpenses = Expense::where('user_id', $user->id)
            ->latest()
            ->limit(10)
            ->get();
            
        return view('dashboard', compact('totalBudget', 'totalSpent', 'spendingByCategory', 'recentExpenses'));
    }
}
