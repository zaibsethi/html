<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('belong_to_gym')->nullable();
            $table->string('employee_id');
            $table->string('employee_name');
            $table->string('employee_phone');
            $table->string('employee_salary_end_date');
            $table->string('employee_package');
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
        Schema::dropIfExists('employee_attendances');
    }
}
