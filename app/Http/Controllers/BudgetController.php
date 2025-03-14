<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Budget;
use App\Models\Category;

class BudgetController extends Controller
{

    public function index()
    {

        $user_id = Auth::id();
        $budget = Budget::where('user_id', $user_id )->get();

        $totalBudget = number_format(Budget::where('user_id', $user_id)->sum('amount'),2);
        return view('budget.index', compact('budget', 'totalBudget'));
    }

    public function create()
    {
        $categories = Category::all(); 
        return view('budget.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'notification_threshold' => 'required|numeric|min:1',
            'category' =>[
                'required',
                'string',
                function ($attribute, $value, $fail){
                    
                    if(Budget::where('category', $value)->exists()){
                     $fail('The ' . $attribute . ' already exist');   
                    }
                   
                }
            ]
            
        ]);

        Budget::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'category' => $request->category,
            'notification_threshold' => $request->notification_threshold 
        ]);

        return redirect()->route('budget.index')->with('success', 'Budget set successfully.');
    }


    public function edit(Budget $budget)
    {
        $this->authorize('update', $budget);
        return view('budget.edit', compact('budget'));
    }



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
