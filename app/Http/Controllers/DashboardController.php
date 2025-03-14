<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Budget;
use App\Models\Income;
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

        $totalIncome = Income::where('user_id', $user->id)->sum('amount');

    
        $netSavings = number_format($totalIncome - $totalSpent, 2);

        // Spending by category
        $spendingByCategory = Expense::where('user_id', $user->id)
            ->selectRaw('category, SUM(amount) as total_spent')
            ->groupBy('category')
            ->pluck('total_spent', 'category');

            // Spending by category
        $incomeByCategory = Income::where('user_id', $user->id)
        ->selectRaw('name, SUM(amount) as total_income')
        ->groupBy('name')
        ->pluck('total_income', 'name');

        // Recent expenses
        $recentExpenses = Expense::where('user_id', $user->id)
            ->latest()
            ->limit(10)
            ->get();
            
        return view('dashboard', compact('totalBudget', 'totalSpent',
        'spendingByCategory', 'recentExpenses', 'totalIncome', 'netSavings','incomeByCategory'));
    }
}
