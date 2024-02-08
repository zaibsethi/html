<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeepackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeepackages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('belong_to_gym')->nullable();
            $table->string('package_name');
            $table->string('package_amount');
            $table->string('package_description');
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
        Schema::dropIfExists('employeepackages');
    }
}
