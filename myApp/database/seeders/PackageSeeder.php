<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PackageSeeder extends Seeder
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
            $package = new Package();
            $package->package_name = $faker->name;
            $package->package_amount = $faker->randomNumber();
            $package->package_description = "fdafds fds fd f sa sfd f";
            $package->created_at = now()->format('Y-m-d');
            $package->updated_at = now()->format('Y-m-d');
            $package->save();
        }
    }
}
