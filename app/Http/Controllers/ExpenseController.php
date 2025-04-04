<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = auth()->user()->expenses()->latest()->get();

        $totalExpense = number_format(auth()->user()->expenses()->sum('amount'), 2);
        return view('expenses.index', compact('expenses', 'totalExpense'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'receipt' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:50000'
        ]);

        
           
        

        $receiptPath = null;
        if ($request->hasFile('receipt')){
            $receiptPath = $request->file('receipt')->store('receipts', 's3');
            Storage::disk('s3')->setVisibility($receiptPath, 'public');
        }
       
        Expense::create([
            'user_id' => Auth::id(),
            'description' => $request->description,
            'date' => $request->date,
            'category' => $request->category,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'receipt_path' => $receiptPath
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully !');
    }

    public function edit(Expense $expense)
    {
        $categories = Category::all();
        $this->authorize('update', $expense);
        return view('expenses.edit', compact('expense','categories'));
    }

    public function update(Request $request, Expense $expense)
    {
        $this->authorize('update', $expense);

        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
        'receipt' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:50000'
        ]);


        $receiptPath = $expense->receipt_path;
        if ($request->hasFile('receipt')) {
            // Delete the old receipt if it exists
            if ($receiptPath) {
                Storage::disk('s3')->delete($receiptPath);
            }
            // Store the new receipt
            $receiptPath = $request->file('receipt')->store('receipts', 's3');
            Storage::disk('s3')->setVisibility($receiptPath, 'public');
        }
    
        $expense->update([
            'category' => $request->category,
            'description' => $request->description,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'receipt_path' => $receiptPath
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully !');
    }

    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);
        if ($expense->receipt_path) Storage::disk('s3')->delete($expense->receipt_path);
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully !');
    }
}
