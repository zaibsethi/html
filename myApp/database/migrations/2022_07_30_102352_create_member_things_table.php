<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_things', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('belong_to_gym')->nullable();
//            $table->string('member_phone');
//            $table->string('member_thing_category');
//            $table->string('member_thing_description')->nullable();
//            $table->string('member_name');
//            $table->string('member_fee_end_Date');
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
        Schema::dropIfExists('member_things');
    }
}
