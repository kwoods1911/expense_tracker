<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;

use App\Models\IncomeCategory;

class IncomeController extends Controller
{


    public function index(){
        $incomes = Income::where('user_id',Auth::id())->get();
        return view('income.index', compact('incomes'));
    }


    public function create(){

        $incomeCategory = IncomeCategory::all();
        return view('income.create', compact($incomeCategory));
    }

    public function store(){

    }


    public function edit(){

    }


    public function update(){

    }


    public function delete(){

    }
    
}
