<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $member = new Member();

            $member->belong_to_gym = 1;
            $member->member_name = $faker->name;
            $member->member_phone = $faker->phoneNumber;
            $member->member_gender = 'M';
            $member->member_package = $faker->phoneNumber;
            $member->member_blood_group = " Positive";
            $member->member_shift = "evening";
            $member->member_joining_date = now();
            $member->member_fee_start_date = now();
            $member->member_fee_end_date = now();
            $member->member_address = $faker->address;
//            $member->all_members_list_api_date = '2022-06-01';
//            $member->default_members_list_api_date = '2022-06-01';
//            $member->active_members_list_api_date = '2022-06-01';
//            $member->new_members_list_api_date = '2022-06-01';
//            $member->daily_members_fee_list_api_date = '2022-06-01';
//            $member->night_shift_members_list_api_date = '2022-06-01';
//            $member->morning_shift_members_list_api_date = '2022-06-01';
//            $member->evening_shift_members_list_api_date = '2022-06-01';
//            $member->api_type ='a';
            $member->member_pemc = "none";
            $member->created_at = now()->format('Y-m-d');
            $member->updated_at = now()->format('Y-m-d');
//            $member->gym_id = 1;
            $member->save();
        }
//
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

    }
}
