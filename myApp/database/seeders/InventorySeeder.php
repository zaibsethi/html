<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InventorySeeder extends Seeder
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
            $inventory = new Inventory();
            $inventory->inventory_title = $faker->name;
            $inventory->inventory_quantity = $faker->randomNumber();
            $inventory->inventory_unit_price = $faker->randomNumber();
            $inventory->inventory_description = "jhjkhjkda djsakljdhsla dsjakldj";
            $inventory->inventory_amount = $faker->randomNumber();
            $inventory->created_at =now()->format('Y-m-d');
            $inventory->updated_at = now()->format('Y-m-d');
            $inventory->save();
        }
    }
}
