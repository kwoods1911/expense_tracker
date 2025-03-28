<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expenses')->insert([
            [
                'user_id' => 1,
                'category' => Category::find(1)->name,
                'amount' => 900,
                'date' => now(),
                'description' => 'Paid half of the rent',
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => Category::find(1)->id,
                'receipt_path' => null,
            ],
        ]);
    }
}
