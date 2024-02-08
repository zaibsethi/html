<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('belong_to_gym')->nullable();
            $table->string('image')->nullable();
            $table->string('employee_name');
            $table->string('employee_phone');
            $table->string('employee_gender');
            $table->string('employee_type');
            $table->string('employee_package');
            $table->string('employee_blood_group')->nullable();
            $table->string('employee_joining_date');
            $table->string('employee_shift');
            $table->string('employee_salary_start_date');
            $table->string('employee_salary_end_date');
            $table->longText('employee_address')->nullable();
            $table->longText('employee_pemc')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
