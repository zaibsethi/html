<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
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
            $employee = new Employee();
            $employee->employee_name = $faker->name;
            $employee->employee_phone = $faker->phoneNumber;
            $employee->employee_gender = 'M';
            $employee->employee_blood_group = " Positive";
            $employee->employee_joining_date = now();
            $employee->employee_fee_date = now();
            $employee->employee_address = $faker->address;
            $employee->employee_pemc = "none";
            $employee->created_at = now()->format('Y-m-d');
            $employee->updated_at = now()->format('Y-m-d');
            $employee->save();
        }
    }
}
