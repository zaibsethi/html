<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Member::factory(10)->create();
        $this->call([
//            MemberSeeder::class,
//            InventorySeeder::class,
//            ExpenseSeeder::class,
//            PackageSeeder::class,
//            EmployeeSeeder::class,
            UserSeeder::class,
//            GymSeeder::class,
        ]);


    }
}
