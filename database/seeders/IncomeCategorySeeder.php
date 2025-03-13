<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('income_category')->insert([
            ['category_name' => 'Salary'],
            ['category_name' => 'Business Income'],
            ['category_name' => 'Freelance Work'],
            ['category_name' => 'Investments'],
            ['category_name' => 'Rental Income'],
            ['category_name' => 'Other'],
        ]);
    }
}
