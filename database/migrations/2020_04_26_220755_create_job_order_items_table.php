<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_order_items', function (Blueprint $table) {
            $table->id();
            $table->string('job_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('service_name')->nullable();
            $table->longText('service_description')->nullable();
            $table->string('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->longText('product_description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('service_fee')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE job_order_items CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_order_items');
    }
}
