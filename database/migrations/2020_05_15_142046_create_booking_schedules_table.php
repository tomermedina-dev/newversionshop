<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->string('booking_date');
            $table->string('booking_time');
            $table->longText('reason')->nullable();
            $table->string('is_approve');
            $table->string('is_request')->default('0');
            $table->timestamps();
        });
            DB::statement('ALTER TABLE booking_schedules CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_schedules');
    }
}
