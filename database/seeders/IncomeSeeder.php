<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\IncomeCategory;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incomes')->insert([
            [
                'user_id' => 1,
                'name' => IncomeCategory::find(1)->category_name,
                'amount' => 2000,
                'income_description' => 'Salary for the month',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => IncomeCategory::find(3)->category_name,
                'amount' => 200,
                'income_description' => 'Photography job',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1,
                'name' => IncomeCategory::find(6)->category_name,
                'amount' => 50,
                'income_description' => 'Cutting grass',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
