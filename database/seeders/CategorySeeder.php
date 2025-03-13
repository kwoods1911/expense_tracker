<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Rent/Mortgage'],
            ['name' => 'Utilities'],
            ['name' => 'Groceries'],
            ['name' => 'Dining Out'],
            ['name' => 'Transportation'],
            ['name' => 'Fuel'],
            ['name' => 'Insurance'],
            ['name' => 'Medical Expenses'],
            ['name' => 'Entertainment'],
            ['name' => 'Clothing'],
            ['name' => 'Education'],
            ['name' => 'Internet'],
            ['name' => 'Phone Bill'],
            ['name' => 'Subscriptions'],
            ['name' => 'Personal Care'],
            ['name' => 'Home Maintenance'],
            ['name' => 'Gifts & Donations'],
            ['name' => 'Travel'],
            ['name' => 'Savings & Investments'],
            ['name' => 'Debt Payments'],
            ['name' => 'Other'],
        ]);
    }
}
