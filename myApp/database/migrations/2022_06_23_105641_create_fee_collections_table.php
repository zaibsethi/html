<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('belong_to_gym')->nullable();
            $table->string('member_id');
            $table->string('member_name');
            $table->string('member_phone');
            $table->string('member_fee_end_date');
            $table->string('package_amount');
            $table->string('amount_received');
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
        Schema::dropIfExists('fee_collections');
    }
}
