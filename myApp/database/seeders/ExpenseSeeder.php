<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 3; $i++) {
            $expense = new Expense();
            $expense->expense_title = $faker->name;
            $expense->expense_amount = $faker->randomNumber();
            $expense->expense_description = "fdafds fds fd f sa sfd f";
            $expense->created_at = now()->format('Y-m-d');
            $expense->updated_at = now()->format('Y-m-d');
            $expense->save();
        }
    }
}
