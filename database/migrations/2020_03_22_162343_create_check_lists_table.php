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
            $table->string('client_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('order_number')->nullable();
            $table->string('contact')->nullable();
            $table->string('order_received')->nullable();
            $table->string('order_dt_time')->nullable();
            $table->string('order_dt_promised')->nullable();
            $table->string('order_actual_dt')->nullable();
            $table->string('notes')->nullable();
            $table->longText('type')->nullable();
            $table->string('odometer_reading')->nullable();
            $table->string('fuel_level')->nullable();
            $table->string('make_model')->nullable();
            $table->string('personal_items')->nullable();
            $table->string('checkbox_items')->nullable();
            $table->string('check_lists')->nullable();
            $table->string('client_email')->nullable();
            $table->string('booking_id')->nullable();
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
