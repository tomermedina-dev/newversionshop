<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_orders', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('checklist_id')->nullable();
            $table->longText('notes')->nullable();
            $table->string('status')->default('0');
            $table->string('is_invoiced')->default('0');
            $table->string('is_released')->default('0');
            $table->string('is_warranty_expired')->default('0');
            $table->timestamps();
        });
          DB::statement('ALTER TABLE job_orders CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_orders');
    }
}
