<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gyms')->insert([
            [
                'name' => 'FitnessZone Garhi shahu',
                'logo' => 'logo',

            ],
            [
                'name' => 'XYZ',
                'logo' => 'logo',

            ],


        ]);

    }
}
