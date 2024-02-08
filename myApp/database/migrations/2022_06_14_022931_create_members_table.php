<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roll_no')->nullable();
            $table->string('belong_to_gym')->nullable();
            $table->string('image')->nullable();
            $table->string('member_name');
            $table->string('member_phone');
            $table->string('member_gender');
            $table->string('member_blood_group')->nullable();
            $table->string('trainer')->nullable();
            $table->string('trainer_fee')->nullable();
            $table->string('member_joining_date');
            $table->string('member_fee_start_date');
            $table->string('member_fee_end_date');
            $table->string('member_shift');
            $table->string('member_package');
            $table->longText('member_address')->nullable();
            $table->string('member_pemc')->nullable();
//            $table->string('api_type')->nullable();
//            $table->string('all_members_list_api_date')->nullable();
//            $table->string('default_members_list_api_date')->nullable();
//            $table->string('active_members_list_api_date')->nullable();
//            $table->string('new_members_list_api_date')->nullable();
//            $table->string('daily_members_fee_list_api_date')->nullable();
//            $table->string('night_shift_members_list_api_date')->nullable();
//            $table->string('morning_shift_members_list_api_date')->nullable();
//            $table->string('evening_shift_members_list_api_date')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
