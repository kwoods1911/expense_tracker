<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{


    public function index(){
        $incomes = Income::where('user_id',Auth::id())->get();
        return view('income.index', compact('incomes'));
    }


    public function create(){
        return view('income.create');
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
