<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('service_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('contact');
            $table->string('address');
            $table->string('unit_id');
            $table->string('service_date_orig');
            $table->string('service_time_orig');
            $table->string('service_date_new')->nullable();
            $table->string('service_time_new')->nullable();
            $table->longText('notes')->nullable();
            $table->string('status');
            $table->longText('reject_reason')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE bookings CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
