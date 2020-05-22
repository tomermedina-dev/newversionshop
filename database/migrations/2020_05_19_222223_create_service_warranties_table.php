<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_warranties', function (Blueprint $table) {
            $table->id();
            $table->string('job_order_id');
            $table->string('warranty_start');
            $table->string('warranty_end');
            $table->string('status');
            $table->string('is_voided')->default('0');
            $table->longText('void_reason')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE service_warranties CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_warranties');
    }
}
