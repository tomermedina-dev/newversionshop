<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOrderAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_order_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('job_order_id');
            $table->string('employee_id');
            $table->string('slot_id');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('status');
            $table->longText('notes')->nullable();
            $table->string('is_approved')->default('0');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE job_order_assignments CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_order_assignments');
    }
}
