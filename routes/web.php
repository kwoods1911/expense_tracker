<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomeController;

use App\Http\Controllers\UserSettings;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/usersettings', [UserSettings::class, 'index'])->name('usersettings');

    Route::get('/editsettings', [UserSettings::class, 'edit'])->name('editsettings');

    Route::put('/updatesettings/{userId}',[UserSettings::class, 'update'])->name('update.setting');
   
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('expenses', ExpenseController::class)->except(['show'])->name('index', 'expenses.index');
    Route::get('/budget', [BudgetController::class, 'index'])->name('budget.index');

    Route::get('/budget/create', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('/budget', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('/budget/{budget}/edit', [BudgetController::class, 'edit'])->name('budget.edit');
    Route::put('/budget/{budget}', [BudgetController::class, 'update'])->name('budget.update');



    Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
    Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
    Route::post('/income', [IncomeController::class, 'store'])->name('income.store');

    Route::get('/income/{income}/edit', [IncomeController::class, 'edit'])->name('income.edit');
    Route::put('/income/{income}', [IncomeController::class, 'update'])->name('income.update');
    //create route to delete income.
    Route::delete('/income/{income}', [IncomeController::class, 'delete'])->name('income.destroy');



    Route::get('/project-description',function(){
        return view('project-description');
    })->name('project-description');

});




Route::get('/', function () {
    return redirect('/login');
});


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   


});

require __DIR__.'/auth.php';
