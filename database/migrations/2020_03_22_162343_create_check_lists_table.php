<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_lists', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('client_name');
            $table->string('order_number');
            $table->string('order_received');
            $table->string('order_dt_time');
            $table->string('order_dt_promised');
            $table->string('order_actual_dt');
            $table->string('odometer_reading');
            $table->string('fuel_level');
            $table->string('make_model');
            $table->string('personal_items');
            $table->string('checkbox_items');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE check_lists CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_lists');
    }
}
