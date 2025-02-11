<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Budget;


class BudgetController extends Controller
{

    public function index()
    {
        $budget = Budget::where('user_id', Auth::id())->first();
        return view('budget.index', compact('budget'));
    }

    public function create()
    {
        return view('budget.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        Budget::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'category' => $request->category,
        ]);

        return redirect()->route('budget.index')->with('success', 'Budget set successfully.');
    }


    public function edit(Budget $budget)
    {
        $this->authorize('update', $budget);
        return view('budget.edit', compact('budget'));
    }

    // public function update(Request $request)
    // {
    //     $user = Auth::user();
    //     $user->update([
    //         'monthly_budget' => $request->monthly_budget,
    //         'notification_threshold' => $request->notification_threshold,
    //         'notification_type' => $request->notification_type,
    //     ]);

    //     return redirect()->back()->with('success', 'Budget settings updated!');
    // }



    public function update(Request $request, Budget $budget)
    {
        $this->authorize('update', $budget);

        $request->validate([
            'amount' => 'required|numeric|min:0',
            'notification_threshold' => 'required|integer|min:1|max:100',
        ]);

        $budget->update([
            'amount' => $request->amount,
            'notification_threshold' => $request->notification_threshold,
        ]);

        return redirect()->route('budget.index')->with('success', 'Budget updated successfully.');
    }
}
