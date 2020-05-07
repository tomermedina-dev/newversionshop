<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('job_order_id');
            $table->string('employee_id');
            $table->string('evaluation_notes');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE job_evaluations CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_evaluations');
    }
}
