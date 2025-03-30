<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Budget;
use App\Models\Category;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('budgets')->insert([
            [
                'user_id' => 1,
                'category' => Category::find(1)->name,
                'amount' => 1000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
