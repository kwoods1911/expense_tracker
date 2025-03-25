<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;

use App\Models\IncomeCategory;

class IncomeController extends Controller
{


    public function index(){

        $user_id = Auth::id();

        $incomes = Income::where('user_id',$user_id)->get();

        $totalIncome = number_format(Income::where('user_id', $user_id)->sum('amount'),2);

        return view('income.index', compact('incomes', 'totalIncome'));
    }


    public function create(){

        $incomeCategory = IncomeCategory::all();
        return view('income.create', compact('incomeCategory'));
    }

    public function store(Request $request){
        
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'income_description' => 'required|string|max:255'
        ]);

        Income::create([
            'user_id' => Auth::id(),
            'name' => $request->category,
            'income_description' => $request->income_description,
            'amount' => $request->amount
        ]);

        return redirect()->route('income.index')->with('success', 'Income added !');
    }


    public function edit(Income $income){
        $this->authorize('update', $income);
        $incomeCategory = IncomeCategory::all();
        return view('income.edit',compact('incomeCategory', 'income'));
    }


    public function update(Request $request, Income $income){

        $this->authorize('update', $income);
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'income_description' => 'nullable|string'
        ]);

        $income->update([
            'category' => $request->category,
            'amount' => $request->amount,
            'income_description' => $request->income_description,
            
        ]);
        return redirect()->route('income.index')->with('success', 'Income updated!');

    }


    public function delete(Income $income){

        $income->delete();

        return redirect()->route('income.index')->with('success', 'Income deleted successfully.');
    }
    
}
