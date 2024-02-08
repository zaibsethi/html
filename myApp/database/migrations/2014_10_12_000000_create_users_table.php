<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gym_id')->nullable();
            $table->string('gym_name')->nullable();
            $table->string('gym_logo')->nullable();
            $table->string('gym_city')->nullable();
            $table->string('gym_area')->nullable();
            $table->string('gym_title')->nullable();
            $table->string('gym_slug')->nullable();
            $table->string('gym_package')->nullable();
            $table->string('message_api_key')->nullable();
            $table->string('gym_package_start_date')->nullable();
            $table->string('gym_package_end_date')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->string('type');
            $table->string('image')->nullable();
            $table->string('belong_to_gym')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
