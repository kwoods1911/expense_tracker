<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Expense;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BudgetSeeder;
use Database\Seeders\IncomeCategorySeeder;
use Database\Seeders\IncomeSeeder;
use Database\Seeders\ExpenseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(IncomeCategorySeeder::class);
        $this->call(IncomeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BudgetSeeder::class);
        $this->call(ExpenseSeeder::class);
    }
}
